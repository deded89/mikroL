<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button id="btnCreate" class="btn btn-sm btn-success mr-1">Buka Cabang Baru</button>
            <a href="#master" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <table id="cabangTable" class="table nowrap">
                <thead>
                    <th class="all">No</th>
                    <th class="all">Nama</th>
                    <th class="all">Status</th>
                    <th class="none">Alamat</th>
                    <th class="none">Telepon</th>
                    <th class="text-center none">Aksi</th>
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
                            <input id="nama_cabang" name="nama_cabang" type="text" class="form-control"
                                placeholder="Nama Cabang" autofocus>
                            <small id="error_nama_cabang" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <textarea id="alamat" name="alamat" rows="3" cols="50" class="form-control"
                                placeholder="Alamat"></textarea>
                            <small id="error_alamat" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input id="telepon" name="telepon" type="text" class="form-control" placeholder="Telepon">
                            <small id="error_telepon" class="text-danger"></small>
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
