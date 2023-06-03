@extends('layout/admin_layout_login')
@section('title','Login | Admin')
@section('container')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    <div class="brand-logo">
                        <img src="../../assets/images/logo.svg">
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="font-weight-light">Sign in to continue.</h6>
                    <form class="pt-3" action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email" name="email">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                            @error('password')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</button>
                        </div>
                        <div class="my-2 d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                            </div>
                            <a href="#" class="auth-link text-black">Forgot password?</a>
                        </div>
                        <div class="mb-2">
                            <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                                <i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


@endsection