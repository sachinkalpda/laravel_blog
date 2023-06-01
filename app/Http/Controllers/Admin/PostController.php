<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.view',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::where('status',1)->get();
        return view('admin.post.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'description' => 'required',
            'category' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png',
            'status' => 'required|numeric'

        ]);

        $image = $request->file('image');
        $extension = $image->extension();
        $filename = time().'.'.$extension;
        $destinationPath = public_path().'/images/posts';
        $image->move($destinationPath,$filename);

        $url = url('/').'/images/posts'.'/'.$filename;
        $category = Category::findOrFail($request->category);
        Post::Create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'category_id' => $category->id,
            'image' => $filename,
            'image_url' => $url,
            'status' => $request->status,
        ]);

        session()->flash('success','Post Created Successfully');
        return redirect('admin/post/all');
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
        $categories = Category::where('status',1)->get();
        $post = Post::findorFail($id);
        return view('admin.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'category' => 'required|numeric',
            'image' => 'mimes:jpg,jpeg,png',
            'status' => 'required|numeric'

        ]);
        $category = Category::findOrFail($request->category);
        $post = Post::findOrFail($id);

        $data = [
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'category_id' => $category->id,
            'status' => $request->status,
        ];

        if($request->file('image')){
            $image = $request->file('image');
            $extension = $image->extension();
            $filename = time().'.'.$extension;
            $destinationPath = public_path().'/images/posts' ;
            $image->move($destinationPath,$filename);

            unlink($destinationPath.'/'.$post->image);
            $url = url('/').'/images/posts'.'/'.$filename;

            $data['image'] = $filename;
            $data['image_url'] = $url;
        }

    
        Post::where('id',$id)->update($data);

        session()->flash('success','Post Created Successfully');
        return redirect('admin/post/all');
    
    }


    public function delete (string $id){
        Post::where('id',$id)->delete();
        session()->flash('success','Post Deleted!');
        return redirect()->back();
    }


    public function trashed (){
        $posts = Post::onlyTrashed()->get();
        return view('admin.post.trash',compact('posts'));
    }

    public function restore(string $id){
        Post::withTrashed()->find($id)->restore();
        session()->flash('success','Post Restored!');
        return redirect('admin/post/all');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::withTrashed()->find($id);
        $post->forceDelete();
        session()->flash('success','Post Deleted Permanently');
        return redirect()->back();
    }
}