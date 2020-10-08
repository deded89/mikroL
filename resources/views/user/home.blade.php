<div id="dashboardHome">
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="user-info">
                        <div class="info-basic">
                            <p><strong>Username</strong> : {{ Auth::User()->username }}</p>
                            <p><strong>Tanggal</strong> : {{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
                        </div>
                        <div class="info-usaha">
                            <p><strong>Nama Usaha</strong> : <span id="nama_toko"><img
                                        src="{{ asset('') }}images\load-bars.gif" alt=""></span></p>
                            <p><strong>Cabang</strong> : <span id="nama_cabang"><img
                                        src="{{ asset('') }}images\load-bars.gif" alt=""></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ORDERS
                </div>
                <div class="card-body my-card">

                    <div class="row no-gutters text-center">
                        <div class="col-6">

                            <div class="card">
                                <div class="card-header">Siap</div>
                                <div class="card-body cl-success">15</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                            <div class="card">
                                <div class="card-header">Hari Ini</div>
                                <div class="card-body">15</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                        </div>
                        <div class="col-6">

                            <div class="card">
                                <div class="card-header">Siap Besok</div>
                                <div class="card-body cl-warning">3</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                            <div class="card">
                                <div class="card-header">Bulan Ini</div>
                                <div class="card-body">15</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                        </div>
                    </div>

                    <div class="row no-gutters my-3 mx-1">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Order">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
