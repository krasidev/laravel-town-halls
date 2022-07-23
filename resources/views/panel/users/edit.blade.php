@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header">{{ __('menu.panel.users.edit') }}</div>

        <div class="card-body">
            <form action="{{ route('panel.users.update', ['user' => $user->id]) }}" method="post" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="name">{{ __('content.panel.users.labels.name') }}: <span class="text-danger">*</span></label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="email">{{ __('content.panel.users.labels.email') }}: <span class="text-danger">*</span></label>

                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" />

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="password">{{ __('content.panel.users.labels.password') }}:</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="password-confirm">{{ __('content.panel.users.labels.password_confirmation') }}:</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="role">{{ __('content.panel.users.labels.role') }}: <span class="text-danger">*</span></label>

                            @php
                                $oldRole = old('role', $user->roles->pluck('id')->first());
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
                    </div>
                </div>

                <hr class="dropdown-divider mt-0 mb-3">

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('content.panel.users.buttons.edit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
