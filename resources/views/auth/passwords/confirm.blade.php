@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="vh-100 d-flex flex-wrap justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="card-header">{{ __('Confirm Password') }}</div>

            <div class="card-body">
                {{ __('Please confirm your password before continuing.') }}

                <form method="POST" action="{{ route('password.confirm') }}" class="auth">
                    @csrf

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}: <span class="text-danger">*</span></label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-block">{{ __('Confirm Password') }}</button>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="btn btn-link btn-block">{{ __('Forgot Your Password?') }}</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
