@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    @if (session('success'))
        <div class="alert alert-success shadow-sm" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header">{{ __('menu.panel.roles.index') }}</div>

        <div class="card-body">
            <table class="table table-bordered" id="roles-table">
                <thead>
                    <tr>
                        <th>{{ __('content.panel.roles.table.headers.id') }}</th>
                        <th>{{ __('content.panel.roles.table.headers.name') }}</th>
                        <th>{{ __('content.panel.roles.table.headers.guard_name') }}</th>
                        <th>{{ __('content.panel.roles.table.headers.readonly') }}</th>
                        <th>{{ __('content.panel.roles.table.headers.created_at') }}</th>
                        <th>{{ __('content.panel.roles.table.headers.updated_at') }}</th>
                        <th>{{ __('content.panel.roles.table.headers.actions') }}</th>
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
    $('#roles-table').DataTable({
        ajax: '{!! route('panel.roles.data') !!}',
        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'name', name: 'name' },
            { data: 'guard_name', name: 'guard_name' },
            { data: 'readonly', name: 'readonly' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
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
