@extends('base_layout')
@section('content')
@push('styles')
<style>
    #test {
        width: 100%;
        margin-left: 0;
    }
</style>
@endpush
<div class="page-content d-flex align-items-center justify-content-center">
    <div class="row w-100 mx-0 auth-page">
        <div class="col-md-8 col-xl-6 mx-auto">
            <div class="card">
                <div class="row">
                    <div class="col-md-4 pe-md-0">
                        <div class="auth-side-wrapper">
                            <img src="{{ asset( 'login.png' ) }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 ps-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                            <a href="{{ route('home') }}" class="noble-ui-logo logo-light d-block mb-2"><img src="{{ asset('assets/ras.png') }}" class="w-25" alt=""></a>
                            <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
                            <form class="forms-sample" action="{{ route('user.register') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="name" placeholder="name">
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="userEmail" placeholder="Email">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="userPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="authCheck">
                                    <label class="form-check-label" for="authCheck">
                                        Remember me
                                    </label>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                        Register
                                    </button>
                                </div>
                                <a href="{{ route('user.login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection