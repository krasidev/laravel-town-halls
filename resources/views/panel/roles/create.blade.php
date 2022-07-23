@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header">{{ __('menu.panel.roles.create') }}</div>

        <div class="card-body">
            <form action="{{ route('panel.roles.store') }}" method="post" autocomplete="off">
                @csrf

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="name">{{ __('content.panel.roles.labels.name') }}: <span class="text-danger">*</span></label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <fieldset>
                    <legend>{{ __('content.panel.roles.legends.permissions') }}:</legend>
                    <div class="row">
                        @php
                            $oldPermissions = old('permissions', []);
                        @endphp
                        @foreach ($permissions as $permission)
                            @php
                                $checked = in_array($permission->id, $oldPermissions) ? 'checked="checked"' : '';
                            @endphp
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="form-check-input" id="permission-{{ $permission->id }}" {{ $checked }} />
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">{{ __('permissions.' . $permission->name) }}</label>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>

                <hr class="dropdown-divider mt-0 mb-3">

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('content.panel.roles.buttons.create') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
