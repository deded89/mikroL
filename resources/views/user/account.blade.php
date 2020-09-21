@extends('layouts.user.app')

@section('title','account')
@push('menu')
@include('layouts.user.bottom_menu')
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-row">
                <div class="col-md-4">
                    <label for="nama_toko">Nama Usaha :</label>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('stores.store') }}" method="POST">
                        @csrf
                        <div class="form-row flex-nowrap">
                            <input type="hidden" name="store_id" value="2">
                            <input type="hidden" name="user_id" value="2">
                            <input id="nama_toko" name="nama_toko" type="text" class="form-control mr-3"
                                value="{{ old('nama_toko',$store->nama_toko) }}">
                            <button id="btnEdit" type="button" class="btn btn-sm btn-transp"><i
                                    class="fa fa-pencil"></i></button>
                            <button id="btnSimpan" type="submit" class="btn btn-sm btn-transp"><i
                                    class="fa fa-save"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row justify-content-center">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-transp"><i class="fa fa-power-off"
                            style="color:red; font-size:2rem"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function () {
        namaTokoRead();
        $('#btnEdit').on('click', function () {
            namaTokoEdit();
        });

        function namaTokoEdit() {
            $('#btnEdit').hide();
            $('#btnSimpan').show();
            $('#nama_toko').removeAttr('disabled', 'disabled');
            $('#nama_toko').focus();
        };

        function namaTokoRead() {
            $('#nama_toko').attr('disabled', 'disabled');
            $('#btnSimpan').hide();
        };
    });

</script>
@endpush
