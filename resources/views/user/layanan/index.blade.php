@extends('layouts.user.app')

@section('title','layanan')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button id="btnCreate" class="btn btn-sm btn-success mr-1">Tambah Layanan Baru</button>
            <a href="{{ route('master') }}" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <table id="simpleTable" class="table nowrap">
                <thead>
                    <th class="all">No</th>
                    <th class="all">Nama</th>
                    <th class="all">Harga</th>
                    <th class="none">Satuan</th>
                    <th class="text-center none">Aksi</th>
                </thead>
            </table>
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

                        <input type="hidden" name="layanan_id" id="layanan_id">
                        <div class="form-group">
                            <input id="nama_layanan" name="nama_layanan" type="text" class="form-control"
                                placeholder="Nama layanan" autofocus>
                            <small id="error_nama_layanan" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="kg">Kg</option>
                                <option value="pcs">Pcs</option>
                                <option value="mtr">Meter<sup>2</sup></option>
                            </select>
                            <small id="error_satuan" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input id="harga" name="harga" type="numeric" class="form-control" placeholder="Harga">
                            <small id="error_harga" class="text-danger"></small>
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
<link rel="stylesheet" href="{{ asset('') }}plugins\dataTable\datatables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.3.1/dist/sweetalert2.min.css">
@endpush
@push('datatable-js')
<script src="{{ asset('') }}plugins\dataTable\datatables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.3.1/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let
            table = $('#simpleTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                stateSave: true,
                pagingType: 'simple',
                language: {
                    paginate: {
                        previous: '‹',
                        next: '›'
                    },
                    aria: {
                        paginate: {
                            previous: 'Previous',
                            next: 'Next'
                        }
                    }
                },
                dom: '<"d-flex justify-content-between"pf>t', //default is 'lftipr' pagingType: 'simple' ,
                ajax: "{{ route('layanans.index') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                }, {
                    data: 'nama_layanan',
                    name: 'nama_layanan',
                }, {
                    data: 'harga',
                    name: 'harga',
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                }, {
                    data: 'satuan',
                    name: 'satuan',
                    render: function (data) {
                        if (data == "mtr") return "Meter2";
                        if (data == "pcs") return "Pcs";
                        return "Kg";
                    }
                }, {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }, ]
            });
        $('#formModal').on('hidden.bs.modal', function (e) {
            $('#formInput').trigger("reset");
            $('#error_nama_layanan').text('');
            $('#error_harga').text('');
            $('#error_satuan').text('');
            $('#layanan_id').val("");
        });
        $('#btnCreate').on('click', function (e) {
            $('#formModal').modal('show');
            $('#btnSave').text('Buat');
        });
        $('body').on('click', '.editLayanan', function () {
            const layanan_id = $(this).attr('data-id');
            $.get("{{ route('layanans.index') }}" + '/' + layanan_id + '/edit',
                function (data) {
                    $('#formModal').modal('show');
                    $('#layanan_id').val(data.id);
                    $('#nama_layanan').val(data.nama_layanan);
                    $('#satuan').val(data.satuan);
                    $('#harga').val(formatNumberIna(data.harga));
                    $('#btnSave').html('Simpan Edit');
                })
        });
        $('#formInput').submit(function (e) {
            e.preventDefault();
            let btnSave = $('#btnSave');
            const
                layanan_id = $('#layanan_id').val();
            let url = "{{ route('layanans.store') }}";
            let type = 'POST'; //hilangkan format rupiah
            let harga = $('#harga').val();
            $('#harga').val(harga.replace(/[^,\d]/g, ''));
            $.ajax({
                url: url,
                type: type,
                dataType: 'json',
                data: $('#formInput').serialize(),
                success: function (data) {
                    $('#formModal').modal('hide');
                    table.draw();
                    Swal.fire({
                        icon: 'success',
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
                        $('#error_nama_layanan').text(errors.nama_layanan);
                        $('#error_satuan').text(errors.satuan);
                        $('#error_harga').text(errors.harga);
                        btnSave.text('Simpan');
                        Swal.fire({
                            type: 'error',
                            title: status,
                            text: "Kesalahan Pengisian Formulir",
                        });
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
        $('body').on('click', '.hapusLayanan', function (e) {
            Swal.fire({
                title: 'Yakin Hapus?',
                text: "Data tidak bisa dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus Saja!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const cabangId = $(this).attr('data-id');
                    $.ajax({
                        url: "{{ route('layanans.index')}}" + "/" + cabangId,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (data) {
                            table.draw();
                            let msgText = data.sukses;
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: msgText,
                                timer: 1300,
                                showConfirmButton: false,
                            });
                        },
                    });
                }
            })
        });

        $('#harga').on('keyup', function () {
            let value = $(this).val();
            $(this).val(formatNumberIna(value));
        });
    });

</script>
@endpush
