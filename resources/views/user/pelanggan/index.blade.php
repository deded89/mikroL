<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button id="btnCreate" class="btn btn-sm btn-success mr-1">Tambah Pelanggan Baru</button>
            <a href="#master" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <table id="pelangganTable" class="table nowrap">
                <thead>
                    <th class="all">No</th>
                    <th class="all">Nama</th>
                    <th class="none">Alamat</th>
                    <th class="none">Telepon</th>
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
                <form id="formInput" action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="pelanggan_id" id="pelanggan_id">
                        <div class="form-group">
                            <input id="nama_pelanggan" name="nama_pelanggan" type="text" class="form-control"
                                placeholder="Nama" autofocus>
                            <small id="error_nama_pelanggan" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control"
                                placeholder="Alamat"></textarea>
                            <small id="error_alamat" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input id="telepon" name="telepon" type="numeric" class="form-control"
                                placeholder="No Telepon">
                            <small id="error_telepon" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto" id="foto" class="form-control" />
                            <span class="text-muted"> foto format : jpg, png, gif</span>
                            <small id="error_foto" class="text-danger"></small>
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


    <div class="modal fade" id="modal-foto" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    <img id="foto" src="" class="img-fluid" alt="Foto Pelanggan">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
