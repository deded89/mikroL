@extends('layouts.user.app')

@section('title','master data')
@push('menu')
@include('layouts.user.bottom_menu')
@endpush

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-body my-card">

                    <div class="row no-gutters text-center">
                        <div class="col-6">

                            <div class="card">
                                <div class="card-header">Cabang</div>
                                <div class="card-body">1</div>
                                <a href="{{ route('cabangs.index') }}" class="card-footer">Detail <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <div class="card">
                                <div class="card-header">Karyawan</div>
                                <div class="card-body">3</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                        </div>
                        <div class="col-6">

                            <div class="card">
                                <div class="card-header">Layanan</div>
                                <div class="card-body">3</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                            <div class="card">
                                <div class="card-header">Pelanggan</div>
                                <div class="card-body">50</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
