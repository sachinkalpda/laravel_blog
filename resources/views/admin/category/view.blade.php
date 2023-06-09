@extends('layout/admin_layout')
@section('title','Category | Admin')
@section('container')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Categories 
                            <div class="header-links">
                                <a href="{{ route('category.add') }}" class="btn btn-inverse-success btn-icon"><i class="mdi mdi-note-plus-outline"></i></a>
                                <a href="{{ route('category.trashed') }}" class="btn btn-inverse-danger btn-icon"><i class="mdi mdi-delete"></i></a>
                            </div></h4>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td >{{ $category->slug }}</td>
                                    <td><label class="badge  @if($category->status == 1) {{ 'badge-success'}} @else {{ 'badge-danger' }} @endif">@if($category->status == 1) {{ 'Active'}} @else {{ 'Inactive' }} @endif</label></td>
                                    <td><a href="{{ route('category.edit',[$category->id ]) }}" class="text-primary"><i class="mdi mdi mdi-grease-pencil"></i></a>
                                <a href="{{ route('category.delete',[$category->id ]) }}" class="text-danger"><i class="mdi mdi-delete"></i></a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
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