function writePelangganData(hash) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let table = $('#pelangganTable').DataTable({
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
        ajax: hash + "/data",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nama_pelanggan',
                name: 'nama_pelanggan',
                render: function (data) {
                    return data.charAt(0).toUpperCase() + data.slice(
                        1); //uppercase first char
                }
            },
            {
                data: 'alamat',
                name: 'alamat',
            },
            {
                data: 'telepon',
                name: 'telepon',
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
        $('#error_nama_pelanggan').text('');
        $('#error_alamat').text('');
        $('#error_telepon').text('');
        $('#pelanggan_id').val("");
        $('img#foto').attr('src', '');
    });
    $('#btnCreate').on('click', function (e) {
        $('#formModal').modal('show');
        $('#btnSave').text('Buat');
    });
    $('body').on('click', '.editPelanggan', function () {
        const pelanggan_id = $(this).attr('data-id');
        $.get(hash + '/' + pelanggan_id + '/edit',
            function (data) {
                $('#formModal').modal('show');
                $('#pelanggan_id').val(data.id);
                $('#nama_pelanggan').val(data.nama_pelanggan);
                $('#alamat').val(data.alamat);
                $('#telepon').val(data.telepon);
                $('#btnSave').html('Simpan Edit');
            })
    });

    $('body').on('click', '.lihatFoto', function () {
        const pelanggan_id = $(this).attr('data-id');
        $.get(hash + '/' + pelanggan_id + '/edit',
            function (data) {
                $('#modal-foto').modal('show');
                $('img#foto').attr('src', "storage/" + data.image);
            });
    });

    $('#formInput').submit(function (e) {
        e.preventDefault();
        let btnSave = $('#btnSave');
        let url = hash;
        let type = 'POST';

        $.ajax({
            url: url,
            type: type,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            data: new FormData(this),
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
                    $('#error_nama_pelanggan').text(errors.nama_pelanggan);
                    $('#error_alamat').text(errors.alamat);
                    $('#error_telepon').text(errors.telepon);
                    btnSave.text('Simpan');
                    Swal.fire({
                        icon: 'error',
                        title: status,
                        text: "Kesalahan Pengisian Formulir",
                    });
                }
            },
            error: function (data, status, xhr) {
                Swal.fire({
                    icon: 'error',
                    title: status,
                    text: xhr,
                });
                btnSave.text('Simpan');
            },
        });
    });
    $('body').on('click', '.hapusPelanggan', function (e) {
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
                const pelangganId = $(this).attr('data-id');
                $.ajax({
                    url: "{{ route('pelanggans.index')}}" + "/" + pelangganId,
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
                table.draw();
            }
        })
    });

}
