@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success shadow-sm" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between">
            {{ __('menu.panel.town-halls.index') }}

            <a href="{{ route('panel.town-halls.export') }}">
                <i class="fas fa-download"></i>
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered" id="town-halls-table">
                <thead>
                    <tr>
                        <th>{{ __('content.panel.town-halls.table.headers.id') }}</th>
                        <th>{{ __('content.panel.town-halls.table.headers.abbreviation') }}</th>
                        <th>{{ __('content.panel.town-halls.table.headers.ekatte_num') }}</th>
                        <th>{{ __('content.panel.town-halls.table.headers.name') }}</th>
                        <th>{{ __('content.panel.town-halls.table.headers.actions') }}</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    $('#town-halls-table').DataTable({
        ajax: '{!! route('panel.town-halls.data') !!}',
        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'abbreviation', name: 'abbreviation' },
            { data: 'ekatte_num', name: 'ekatte_num' },
            { data: 'name', name: 'name' },
            { data: 'actions', name: 'actions', searchable: false, orderable: false }
        ]
    });

    setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
});
</script>
@endsection
