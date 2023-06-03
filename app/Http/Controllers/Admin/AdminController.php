<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Admin::all();
        return view('admin.author.view',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.register');
    }


    public function registerAuthor()
    {
        return view('admin.author.add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|confirmed|min:5'
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'status' => 1
        ]);
        session()->flash('success','User Registered!');
        return redirect('admin/author/all');
    }

    /**
     * Display the specified resource.
     */

    public function loginView(){
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        
    }


    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Admin::findOrFail($id);
        return view('admin.author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'in:admin,author',
            'status' => 'required|numeric'
        ]);

        Admin::where('id',$id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'status' => $request->status,
        ]);
        session()->flash('success','User Updated!');
        return redirect('admin/author/all');
    }

    public function renderChangePassword(string $id){
        $author = Admin::find($id);
        return view('admin.author.change_password',compact('author'));
    }


    public function updatePassword(Request $request, string $id){
        $request->validate([
            'password' => 'required|confirmed|min:5'
        ]);

        Admin::where('id',$id)->update([
            'password' => Hash::make($request->password)
        ]);
        session()->flash('success','Password Updated!');
        return redirect()->back();
    }


    public function trashed (){
        $authors = Admin::onlyTrashed()->get();
        return view('admin.author.trash',compact('authors'));
    }

    public function delete (string $id){
        Admin::where('id',$id)->delete();
        session()->flash('success','Author Deleted!');
        return redirect()->back();
    }


    public function restore(string $id){
        Admin::withTrashed()->find($id)->restore();
        session()->flash('success','Author Restored!');
        return redirect('admin/author/all');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Admin::withTrashed()->find($id);
        $author->forceDelete();
        session()->flash('success','Auhtor Deleted Permanently');
        return redirect()->back();
    }
}
