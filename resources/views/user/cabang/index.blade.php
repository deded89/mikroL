@extends('layouts.user.app')

@section('title','cabang')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button id="btnCreate" class="btn btn-sm btn-success mr-1">Buka Cabang Baru</button>
            <a href="{{ route('master') }}" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <table id="simpleTable" class="table nowrap">
                <thead>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </thead>
            </table>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            Limit Cabang Anda : 4 / 5
        </div>
    </div>

    {{-- =========================================
    MODAL CREATE
    ========================================= --}}
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="createModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formInput" action="" method="POST">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="cabang_id" id="cabang_id">
                        <div class="form-group">
                            <label for="name">Nama Cabang</label>
                            <input id="nama_cabang" name="nama_cabang" type="text" class="form-control" autofocus>
                            <small id="error_nama_cabang" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button id="btnSave" type="submit" class="btn btn-primary">btnSave</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



@push('datatable-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('') }}plugins\dataTable\datatables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('') }}plugins\sweetalert2\sweetalert2.css">
@endpush
@push('datatable-js')
<script src="{{ asset('') }}plugins\dataTable\datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('') }}plugins\sweetalert2\sweetalert2.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let table = $('#simpleTable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            dom: '<"d-flex justify-content-between"pf>t', //default is 'lftipr'
            pagingType: 'simple',
            ajax: "{{ route('cabangs.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_cabang',
                    name: 'nama_cabang',
                },
                {
                    data: 'is_open',
                    name: 'status',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });
        $('#formModal').on('hidden.bs.modal', function (e) {
            $('#formInput').trigger("reset");
            $('#error_nama_cabang').text('');
            $('#cabang_id').val("");
        });

        $('#btnCreate').on('click', function (e) {
            $('#formModal').modal('show');
            $('#btnSave').text('Buat');
        });

        $('body').on('click', '.editCabang', function () {
            const cabang_id = $(this).attr('data-id');
            $.get("{{ route('cabangs.index') }}" + '/' + cabang_id + '/edit', function (data) {
                $('#formModal').modal('show');
                $('#cabang_id').val(data.id);
                $('#nama_cabang').val(data.nama_cabang);
                $('#btnSave').html('Simpan Edit');
            })
        });

        $('#formInput').submit(function (e) {
            e.preventDefault();
            let btnSave = $('#btnSave');
            const cabang_id = $('#cabang_id').val();
            let url = '';
            let type = '';

            //tentukan edit atau create
            if (cabang_id == '') {
                url = "{{ route('cabangs.store') }}";
                type = "POST";
            } else {
                url = "{{ route('cabangs.index') }}" + "/" + cabang_id;
                type = "PATCH";
            };

            $.ajax({
                url: url,
                type: type,
                dataType: 'json',
                data: $('#formInput').serialize(),
                success: function (data) {
                    $('#formModal').modal('hide');
                    table.draw();
                    Swal.fire({
                        type: 'success',
                        title: 'Berhasil',
                        text: 'Data Tersimpan !',
                        timer: 1300,
                        showConfirmButton: false,
                    });
                },
                beforeSend: function () {
                    btnSave.text('Sending..');
                },
                statusCode: {
                    422: function (data) {
                        let errors = data.responseJSON.errors;
                        $('#error_nama_cabang').text(errors.nama_cabang);
                        btnSave.text('Simpan');
                    }
                },
                error: function (data, status, xhr) {
                    console.log(xhr);
                    Swal.fire({
                        type: 'error',
                        title: status,
                        text: xhr,
                    });
                    btnSave.text('Simpan');
                },
            });

        });

        $('body').on('click', '.toggleStatus', function (e) {
            const cabangId = $(this).attr('data-id');
            $.get("{{ route('cabangs.index')}}" + "/" + cabangId + "/ubah", function (data) {
                table.draw();
                let msgText = data.sukses;
                Swal.fire({
                    type: 'success',
                    title: 'Berhasil',
                    text: msgText,
                    timer: 1300,
                    showConfirmButton: false,
                });
            })
        });
    });

</script>
@endpush
