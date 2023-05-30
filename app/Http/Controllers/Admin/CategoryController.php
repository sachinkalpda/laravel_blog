<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.view',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories',
            'status' => 'required|numeric'
        ]);
        Category::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status
        ]);
        session()->flash('success','Category Created Successfully');
        return redirect('/admin/category/all');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:categories',
            'status' => 'required|numeric'
        ]);
        Category::where('id',$id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'status' => $request->status
        ]);
        session()->flash('success','Category Updated Successfully');
        return redirect('/admin/category/all');
    }


    public function delete (string $id){
        Category::where('id',$id)->delete();
        session('flash','Category Deleted!');
        return redirect()->back();
    }


    public function trashed (){
        $categories = Category::onlyTrashed()->get();
        return view('admin.category.trash',compact('categories'));
    }



    public function restore(string $id){
        Category::withTrashed()->find($id)->restore();
        session()->flash('success','Category Restored!');
        return redirect('admin/category/all');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::withTrashed()->find($id);
        $category->forceDelete();
        session()->flash('success','Category Deleted Permanently');
        return redirect()->back();
    }
}
