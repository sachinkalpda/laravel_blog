@extends('layout/admin_layout')
@section('title','Change Password | Admin')
@section('container')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password
                            <div class="header-links">
                                <a href="{{ route('admin.all') }}" class="btn btn-inverse-success btn-icon"><i class="mdi mdi-keyboard-backspace"></i></a>

                            </div>
                        </h4>
                        <form class="forms-sample" action="{{ route('admin.update.password',['id' => $author->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputUsername1" placeholder="Name">
                                        @error('password')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputUsername1" placeholder="Confirm Password" >
                                        @error('password_confirmation')
                                        <span class="error-message">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>             
                            <button type="submit" class="btn btn-gradient-primary me-2">Change Password</button>
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