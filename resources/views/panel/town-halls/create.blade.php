@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <div class="card shadow-sm">
        <div class="card-header">{{ __('menu.panel.town-halls.create') }}</div>

        <div class="card-body">
            <form action="{{ route('panel.town-halls.store') }}" method="post" autocomplete="off">
                @csrf

                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="abbreviation">{{ __('content.panel.town-halls.labels.abbreviation') }}: <span class="text-danger">*</span></label>

                            <input id="abbreviation" type="text" class="form-control @error('abbreviation') is-invalid @enderror" name="abbreviation" value="{{ old('abbreviation') }}" />

                            @error('abbreviation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="ekatte_num">{{ __('content.panel.town-halls.labels.ekatte_num') }}: <span class="text-danger">*</span></label>

                            <input id="ekatte_num" type="text" class="form-control @error('ekatte_num') is-invalid @enderror" name="ekatte_num" value="{{ old('ekatte_num') }}" />

                            @error('ekatte_num')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="name">{{ __('content.panel.town-halls.labels.name') }}: <span class="text-danger">*</span></label>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" />

                            @error('name')
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
                        <button type="submit" class="btn btn-primary">{{ __('content.panel.town-halls.buttons.create') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
