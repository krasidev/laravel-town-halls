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
                <div class="card-header">{{ __('menu.panel.town-halls.index') }}</div>

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
    </div>
</div>
@endsection

@section('scripts')
<script>
$(function() {
    var table = $('#town-halls-table').DataTable({
        ajax: '{!! route('panel.town-halls.data') !!}',
        columns: [
            { data: 'id', name: 'id', searchable: false },
            { data: 'abbreviation', name: 'abbreviation' },
            { data: 'ekatte_num', name: 'ekatte_num' },
            { data: 'name', name: 'name' },
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
