function writeLayananData(hash) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let table = $('#layananTable').DataTable({
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
        $.get(hash + '/' + layanan_id + '/edit',
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
        const layanan_id = $('#layanan_id').val();
        let url = hash;
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
                    url: hash + "/" + cabangId,
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

    $('#harga').on('keyup', function () {
        let value = $(this).val();
        $(this).val(formatNumberIna(value));
    });
};
