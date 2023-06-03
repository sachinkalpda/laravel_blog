@extends('layout/admin_layout_login')
@section('title','Register | Admin')
@section('container')
<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left p-5">
                    <div class="brand-logo">
                        <img src="../../assets/images/logo.svg">
                    </div>
                    <h4>New here?</h4>
                    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
                    <form class="pt-3" action="{{ route('admin.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" name="name" id="exampleInputUsername1"
                                placeholder="Name">
                                @error('name')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1"
                                placeholder="Email">
                                @error('email')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1"
                                placeholder="Password">
                                @error('password')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-lg" name="password_confirmation" id="exampleInputEmail1"
                                placeholder="Confirm Password">
                                @error('password_confirmation')
                                <span class="error-message">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                                >SIGN UP</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="login.html"
                                class="text-primary">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>


@endsection