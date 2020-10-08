// ======================
// ACCOUNTPAGE FUNCTION
// ======================

function writeAccountData(hash) {
    $.get(hash + '/data', function (data) {
        namaTokoRead();
        addEventToAccountPage();
        $('input#nama_toko').val(data.store.nama_toko)
        $('#accountName').text(data.profile.nama);
        $('#accountDetail>li:nth-child(1)>span').text(data.email);
        $('#accountDetail>li:nth-child(2)>span').text(data.profile.alamat);
        $('#accountDetail>li:nth-child(3)>span').text(data.profile.telepon);

        if (data.profile.image == null) {
            $('.foto-profil>img').attr('src',
                "images/users-face/default_profile_photo.png");
        } else {
            $('.foto-profil>img').attr('src', data.profile.image);
        }

    });
}

function editProfileGetData() {
    addEventToEditProfilePage();
    $.get("account/data", function (data) {
        $('#profile_id').val(data.profile.id);
        $('#nama_user').val(data.profile.nama);
        $('#alamat').text(data.profile.alamat);
        $('#telepon').val(data.profile.telepon);
        $('img#foto').attr('src', data.profile.image);
    });
}

function addEventToEditProfilePage() {
    $('#formEditProfile').submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: myUrl + "/save-profile",
            type: "POST",
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false,
            data: formData,
            success: function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Data Tersimpan !',
                    timer: 1300,
                    showConfirmButton: false,
                });
                location.hash = 'account';
            },
            statusCode: {
                422: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error Pengisian Form',
                    });
                    let errors = data.responseJSON.errors;
                    $('#error_nama_user').text(errors.nama_user);
                    $('#error_alamat').text(errors.alamat);
                    $('#error_telepon').text(errors.telepon);
                }
            },
            error: function (data, status, xhr) {
                Swal.fire({
                    icon: 'error',
                    title: status,
                    text: xhr,
                });
                console.log(data);
            }
        })
    });
}

function namaTokoEdit() {
    $('#btnEdit').hide();
    $('#btnSimpan').show();
    $('input#nama_toko').removeAttr('disabled', 'disabled');
    $('input#nama_toko').focus();
}

function namaTokoRead() {
    $('input#nama_toko').attr('disabled', 'disabled');
    $('#btnSimpan').hide();
    $('#btnEdit').show();
}

function addEventToAccountPage() {
    $('#btnEdit').on('click', function () {
        namaTokoEdit();
    })

    $('#storeNameForm').submit(function (e) {
        e.preventDefault();
        simpanNamaToko();
    })
}

function simpanNamaToko() {
    $.ajax({
        url: myUrl + "/stores",
        type: "PATCH",
        dataType: "JSON",
        data: $('#storeNameForm').serialize(),
        success: function (data) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Tersimpan !',
                timer: 1300,
                showConfirmButton: false,
            });
            namaTokoRead();
        },
        statusCode: {
            422: function (data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.responseJSON.errors.nama_toko,
                });
            }
        },
        error: function (data, status, xhr) {
            Swal.fire({
                icon: 'error',
                title: status,
                text: xhr,
            });
        }
    })

}
