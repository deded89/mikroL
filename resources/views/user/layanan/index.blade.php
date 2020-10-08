<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-end">
            <button id="btnCreate" class="btn btn-sm btn-success mr-1">Tambah Layanan Baru</button>
            <a href="#master" class="btn btn-sm btn-danger">Kembali</a>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <table id="layananTable" class="table nowrap">
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
