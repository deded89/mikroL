<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 d-flex justify-content-center">
            <div class="form-row">
                <form id="storeNameForm" action="" method="POST">
                    @csrf
                    <div class="form-row flex-nowrap">
                        <input type="hidden" name="store_id" value="2">
                        <input type="hidden" name="user_id" value="2">
                        <input id="nama_toko" name="nama_toko" type="text" class="form-control mr-3" value=""
                            placeholder="Nama Usaha Anda">
                        <button id="btnEdit" type="button" class="btn btn-sm btn-transp"><i
                                class="fa fa-pencil"></i></button>
                        <button id="btnSimpan" type="submit" class="btn btn-sm btn-transp"><i
                                class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-8 d-flex justify-content-center">
            <div class="card d-flex" style="width:100%">
                <div class="foto-profil">
                    <img class="card-img-top" src="{{ asset('') }}images\load-spinner-big.gif" alt="Foto Profile">
                </div>
                <div class="card-body">
                    <h5 id="accountName" class="card-title text-center"><img src="{{ asset('') }}images\load-bars.gif"
                            alt=""></h5>
                </div>
                <ul id="accountDetail" class="list-group list-group-flush">
                    <li class="list-group-item">Email : <span><img src="{{ asset('') }}images\load-bars.gif"
                                alt=""></span></li>
                    <li class="list-group-item">Alamat : <span><img src="{{ asset('') }}images\load-bars.gif"
                                alt=""></span></li>
                    <li class="list-group-item">Telepon : <span><img src="{{ asset('') }}images\load-bars.gif"
                                alt=""></span></li>
                </ul>
                <div class="card-body">
                    <a href="#edit-profile" class="card-link">Edit</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center mt-5">
        <div class="col-md-8 d-flex justify-content-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-transp"><i class="fa fa-power-off"
                        style="color:red; font-size:2rem"></i></button>
                <label>Keluar</label>
            </form>
        </div>
    </div>
</div>
