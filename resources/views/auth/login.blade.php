@extends('templates.auth_header')

@section('content')
<div class="container h-100 d-flex justify-content-center align-items-center">
    <div class="row justify-content-center w-100">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-danger text-white text-center py-4">
                    <h4 class="mb-0">{{ __('Kominfotik') }}</h4>
                    <img src="{{ asset('assets/img/logo.png') }}" class="mt-3" width="100" height="100">
                </div>
                <div class="card-body p-4">
                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Enter your email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Enter your password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger w-100 py-2">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center bg-light py-3">
                    <small>
                        <a href="{{ route('tentang') }}" class="btn btn-primary">
                            Kembali Ke Profile
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection