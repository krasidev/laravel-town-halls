@extends('layouts.panel')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">{{ __('menu.panel.users.index') }}</div>

                <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>{{ __('content.panel.users.table.headers.id') }}</th>
                                <th>{{ __('content.panel.users.table.headers.name') }}</th>
                                <th>{{ __('content.panel.users.table.headers.email') }}</th>
                                <th>{{ __('content.panel.users.table.headers.role') }}</th>
                                <th>{{ __('content.panel.users.table.headers.created_at') }}</th>
                                <th>{{ __('content.panel.users.table.headers.updated_at') }}</th>
                                <th>{{ __('content.panel.users.table.headers.actions') }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    var table = $('#users-table').DataTable({
        ajax: '{!! route('panel.users.data') !!}',
        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'roles', name: 'roles', searchable: false, orderable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { data: 'actions', name: 'actions', searchable: false, orderable: false }
        ]
    });

    table.on('click', '.dt-bt-delete', function(e) {
        var href = $(this).attr('href');
        var data = table.row($(this).parents('tr')).data();

        if (data == undefined) {
            data = table.row(this).data();
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: href,
            type: 'DELETE',
            success: function(data) {
                table.row($(this).parents('tr')).remove().draw();
            }
        });

        e.preventDefault();
    });

    setTimeout(function() {
        $('.alert').fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 2000);
});
</script>
@endsection
