function writeCabangData(hash) {


    let table = $('#cabangTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        stateSave: true,
        pagingType: 'simple',
        language: {
            loadingRecords: '&nbsp;',
            processing: 'loading euy...',
            paginate: {
                previous: '‹',
                next: '›'
            },
            aria: {
                paginate: {
                    previous: 'Previous',
                    next: 'Next'
                }
            },
        },
        dom: '<"d-flex justify-content-between"pf>t', //default is 'lftipr'
        ajax: hash + "/data",
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
                name: 'is_open',
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
        $('#error_nama_cabang').text('');
        $('#error_alamat').text('');
        $('#error_telepon').text('');
        $('#cabang_id').val("");
    });

    $('#btnCreate').on('click', function (e) {
        $('#formModal').modal('show');
        $('#btnSave').text('Buat');
    });

    $('body').on('click', '.editCabang', function () {
        const cabang_id = $(this).attr('data-id');
        $.get(hash + '/' + cabang_id + '/edit', function (data) {
            $('#formModal').modal('show');
            $('#cabang_id').val(data.id);
            $('#nama_cabang').val(data.nama_cabang);
            $('#alamat').val(data.alamat);
            $('#telepon').val(data.telepon);
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
            url = hash;
            type = "POST";
        } else {
            url = hash + "/" + cabang_id;
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
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Kesalahan Pengisian Form',
                    });
                    let errors = data.responseJSON.errors;
                    $('#error_nama_cabang').text(errors.nama_cabang);
                    $('#error_alamat').text(errors.alamat);
                    $('#error_telepon').text(errors.telepon);
                    btnSave.text('Simpan');
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

    $('body').on('click', '.toggleStatus', function (e) {
        const cabangId = $(this).attr('data-id');
        $.get(hash + "/" + cabangId + "/ubah", function (data) {
            table.draw();
            let msgText = data.sukses;
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: msgText,
                timer: 1300,
                showConfirmButton: false,
            });
        })
    });
}
