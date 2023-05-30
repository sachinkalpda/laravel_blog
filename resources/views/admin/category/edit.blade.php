@extends('layout/admin_layout')
@section('title','Category | Admin')
@section('container')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Catogory
                            <div class="header-links">
                                <a href="{{ route('category.all') }}" class="btn btn-inverse-success btn-icon"><i class="mdi mdi-keyboard-backspace"></i></a>

                            </div>
                        </h4>
                        <form class="forms-sample" action="{{ route('category.update',[$category->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Category Name</label>
                                <input type="text" name="title" class="form-control" id="exampleInputUsername1" placeholder="Name" value="{{ $category->title }}">
                                @error('title')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Slug</label>
                                        <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Slug" value="{{ $category->slug }}">
                                        @error('slug')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control form-control-lg" name="status" id="status">
                                            <option value="1" @if($category->status==1) {{'selected'}} @endif>Active</option>
                                            <option value="0" @if($category->status==0) {{'selected'}} @endif>Inactive</option>
                                        </select>
                                        @error('status')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <button type="submit" class="btn btn-gradient-primary me-2">Update Category</button>
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