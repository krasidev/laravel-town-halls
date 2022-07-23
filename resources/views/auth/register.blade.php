@extends('layouts.auth')

@section('content')
<div class="container-fluid">
    <div class="vh-100 d-flex flex-wrap justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="card-header">{{ __('Register') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" class="auth">
                    @csrf

                    <div class="form-group">
                        <label for="name">{{ __('Name') }}: <span class="text-danger">*</span></label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}: <span class="text-danger">*</span></label>
                        
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

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

                    <div class="form-group">
                        <label for="password-confirm">{{ __('Role') }}: <span class="text-danger">*</span></label>

                        @php
                            $oldRole = old('role');
                        @endphp
                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                            @foreach($roles as $role)
                            @php
                                $selected = $role->id == $oldRole ? 'selected="selected"' : '';
                            @endphp
                            <option value="{{ $role->id }}" {{ $selected }}>{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-block">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
