@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="vh-100 d-flex flex-wrap justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="auth">
                    @csrf

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}: <span class="text-danger">*</span></label>
                        
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}: <span class="text-danger">*</span></label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-block">{{ __('Login') }}</button>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-link btn-block">{{ __('Register') }}</a>
                    @endif

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn btn-link btn-block">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
