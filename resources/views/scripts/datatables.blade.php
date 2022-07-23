<script>
$.extend(true, $.fn.dataTable.defaults, {
    processing: true,
    serverSide: true,
    responsive: true,
    pageLength: 5,
    lengthMenu: [5, 10, 15, 20],
    dom:
		"<'row'<'col-sm-12 col-md-6 text-sm-center text-md-left mb-3'l><'col-sm-12 col-md-6 text-sm-center text-md-end mb-3'f>>" +
		"<'row'<'col-sm-12'tr>>" +
		"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 text-end'p>>",
    classes: {
        sLength: 'dataTables_length',
        sLengthSelect: 'form-control',
        sFilter: 'dataTables_filter',
        sFilterInput: 'form-control w-100 ml-0'
    },
    language: {
        decimal: '{{ __('datatables.decimal') }}',
        emptyTable: '{{ __('datatables.emptyTable') }}',
        info: '{{ __('datatables.info') }}',
        infoEmpty: '{{ __('datatables.infoEmpty') }}',
        infoFiltered: '{{ __('datatables.infoFiltered') }}',
        infoPostFix: '{{ __('datatables.infoPostFix') }}',
        thousands: '{{ __('datatables.thousands') }}',
        lengthMenu: '{{ __('datatables.lengthMenu') }}',
        loadingRecords: '{{ __('datatables.loadingRecords') }}',
        processing: '<div class="spinner-border" role="status"><span class="sr-only"></span></div>',
        search: '{{ __('datatables.search') }}',
        searchPlaceholder: '{{ __('datatables.searchPlaceholder') }}',
        zeroRecords: '{{ __('datatables.zeroRecords') }}',
        paginate: {
            first: '<i class="fas fa-angle-double-left"></i>',
            last: '<i class="fas fa-angle-double-right"></i>',
            next: '<i class="fas fa-angle-right"></i>',
            previous: '<i class="fas fa-angle-left"></i>'
        },
        aria: {
            sortAscending: '{{ __('datatables.sortAscending') }}',
            sortDescending: '{{ __('datatables.sortDescending') }}'
        },
        select: {
            rows: {
                _: ' %d {{ __('datatables.selected_many') }}',
                0: '',
                1: ' 1 {{ __('datatables.selected') }}'
            }
        }
    }
});
</script>