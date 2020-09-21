@push('datatable-css')
<link rel="stylesheet" href="{{ asset('') }}plugins\dataTable\datatables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
@endpush
@push('datatable-js')
<script src="{{ asset('') }}plugins\dataTable\datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#simpleTable').DataTable({
            "responsive": false,
            "dom": '<pf>t', //default is 'lftipr'
            "pagingType": 'simple',
        });

        $('#simpleTable_filter').parent().addClass('d-flex justify-content-between align-items-center');
    });

</script>
@endpush
