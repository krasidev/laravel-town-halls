@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="vh-100 d-flex flex-wrap justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="card-header">{{ __('Reset Password') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}" class="auth">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}: <span class="text-danger">*</span></label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('Password') }}: <span class="text-danger">*</span></label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}: <span class="text-danger">*</span></label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                    </div>

                    <button type="submit" class="btn btn-outline-primary">{{ __('Reset Password') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
