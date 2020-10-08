<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-center">
            <div class="card">
                <div class="card-body">
                    <form id="formEditProfile" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input id="nama_user" name="nama_user" type="text" class="form-control" placeholder="Nama"
                                autofocus>
                            <small id="error_nama_user" class="text-danger"></small>
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
                        <div class="form-group d-flex justify-content-center">
                            <img id="foto" src="" class="img-fluid" alt="Foto Pelanggan">
                        </div>
                        <div class="form-group">
                            <input type="file" name="foto" id="foto" class="form-control" />
                            <span class="text-muted"> foto format : jpg, png, gif</span>
                            <small id="error_foto" class="text-danger"></small>
                        </div>
                        <div class="card-footer">
                            <div class="form-group d-flex justify-content-between pt-4">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <a href="#account" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
