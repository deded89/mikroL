function loadContent(hash) {
    if (hash === '') {
        hash = 'home'
    }
    $('#mainContainer').load(myUrl + "/" + hash, function () {
        $('.navbar-brand').text(hash); //set title
        //write data
        switch (hash) {
            case 'home':
                loadBottomMenu();
                writeHomeData(hash);
                break;

            case 'master':
                loadBottomMenu();
                writeMasterData(hash);
                break;

            case 'account':
                loadBottomMenu();
                writeAccountData(hash);
                break;

            case 'cabangs':
                $('#bottomMenu').html('');
                writeCabangData(hash);
                break;

            case 'layanans':
                $('#bottomMenu').html('');
                writeLayananData(hash);
                break;

            case 'pelanggans':
                $('#bottomMenu').html('');
                writePelangganData(hash);
                break;

            case 'edit-profile':
                $('#bottomMenu').html('');
                editProfileGetData();
                break;

            default:
                alert("error write data");
        }
    });
}

function loadBottomMenu() {
    $('#bottomMenu').load(myUrl + "/menu");
}

// ======================
// HOMEPAGE FUNCTION
// ======================

function writeHomeData(hash) {
    $.get(hash + '/data', function (data) {
        $('#nama_toko').text(data.store.nama_toko);
        $('#nama_cabang').text(data.cabang.nama_cabang);
    });
}

// ======================
// MASTERPAGE FUNCTION
// ======================

function writeMasterData(hash) {
    $.get(hash + '/data', function (data) {
        $('#cabangCount').text(data.jmlCabang);
        $('#layananCount').text(data.jmlLayanan);
        $('#pelangganCount').text(data.jmlPelanggan);
    });
}


// ======================
// ON DOCUMENT READY FUNCTION
// ======================

let url = window.location.href;
let hash = url.substring(url.indexOf('#') + 1);
if (hash === url) {
    hash = 'home'
}
loadContent(hash);
loadBottomMenu();



$(window).on('hashchange', function () {
    loadContent(location.hash.slice(1));
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
