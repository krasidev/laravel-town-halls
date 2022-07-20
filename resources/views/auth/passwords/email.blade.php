@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="vh-100 d-flex flex-wrap justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="card-header">{{ __('Reset Password') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="auth">
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

                    <button type="submit" class="btn btn-outline-primary btn-block">{{ __('Send Password Reset Link') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
