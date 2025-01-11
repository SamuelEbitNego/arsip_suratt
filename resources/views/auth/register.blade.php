@extends('templates.auth_header')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-danger text-white text-center py-4">
                    <h4 class="mb-0">{{ __('Form Register | Tata Usaha') }}</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="font-weight-bold">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="font-weight-bold">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="font-weight-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" placeholder="Enter your password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-danger w-100 py-2">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center bg-light py-3">
                    <small>
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary font-weight-bold">{{ __('Login here') }}</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection