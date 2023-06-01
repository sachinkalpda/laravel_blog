@extends('layout/admin_layout')
@section('title','Edit Post | Admin')
@section('container')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Post
                            <div class="header-links">
                                <a href="{{ route('post.all') }}" class="btn btn-inverse-success btn-icon"><i class="mdi mdi-keyboard-backspace"></i></a>

                            </div>
                        </h4>
                        <form class="forms-sample" action="{{ route('post.update',[$post->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Title</label>
                                <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Title" value="{{ $post->title }}">
                                @error('title')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername2">Slug</label>
                                <input type="text" name="slug" class="form-control" id="exampleInputUsername2" placeholder="Slug" value="{{ $post->slug }}">
                                @error('slug')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="editor">Description</label>
                                <textarea name="description" class="form-control" id="editor" placeholder="Description" rows="10">{{ $post->description }}</textarea>
                                @error('description')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select class="form-control form-control-lg" name="category" id="category">
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if($category->id == $post->id) {{'selected'}}  @endif>{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <span class="error-message">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" class="form-control" name="image" id="image" onchange="loadFile(event)">
                                                @error('image')
                                                <span class="error-message">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control form-control-lg" name="status" id="status">
                                                    <option value="1" @if($post->status == 1) {{'selected'}} @endif>Active</option>
                                                    <option value="0" @if($post->status == 0) {{'selected'}} @endif >Inactive</option>
                                                </select>
                                                @error('status')
                                                <span class="error-message">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <img src="{{ $post->image_url }}" id="output" class="img-fluid" />
                                </div>
                            </div>



                            <button type="submit" class="btn btn-gradient-primary me-2">Update Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com
                2021</span>
            <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                    template</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>

@endsection