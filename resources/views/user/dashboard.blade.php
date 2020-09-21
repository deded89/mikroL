@extends('layouts.user.app')

@section('title','Dashboard')
@push('menu')
@include('layouts.user.bottom_menu')
@endpush


@section('content')
<div class="container">
    {{-- INFO PENGGUNA --}}
    <div class="row justify-content-center mb-2">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="user-info">
                        <div class="info-basic">
                            <p>Username : {{ Auth::User()->username }}</p>
                            <p>Tanggal : {{ Carbon\Carbon::now()->format('d-m-Y') }}</p>
                        </div>
                        <div class="info-usaha">
                            <p>Nama Usaha : {{ $store->nama_toko }}</p>
                            <p>Cabang : {{ $cabang->nama_cabang }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- INFO PENGGUNA END --}}
    {{-- INFO ORDER --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ORDERS
                </div>
                <div class="card-body my-card">
                    {{-- orders card --}}
                    <div class="row no-gutters text-center">
                        <div class="col-6">
                            {{-- order siap --}}
                            <div class="card">
                                <div class="card-header">Siap</div>
                                <div class="card-body cl-success">15</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>
                            {{-- order siap end--}}
                            {{-- order hari ini --}}
                            <div class="card">
                                <div class="card-header">Hari Ini</div>
                                <div class="card-body">15</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>
                            {{-- order hari ini end--}}
                        </div>
                        <div class="col-6">
                            {{-- order on besok --}}
                            <div class="card">
                                <div class="card-header">Siap Besok</div>
                                <div class="card-body cl-warning">3</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>
                            {{-- order on besok end--}}

                            {{-- order bulan ini --}}
                            <div class="card">
                                <div class="card-header">Bulan Ini</div>
                                <div class="card-body">15</div>
                                <div class="card-footer">Detail <i class="fa fa-arrow-circle-right"></i></div>
                            </div>
                            {{-- order bulan ini end--}}
                        </div>
                    </div>
                    {{-- orders card end --}}
                    {{-- orders search --}}
                    <div class="row no-gutters my-3 mx-1">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Order">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    {{-- orders search end --}}

                </div>
            </div>
        </div>
    </div>
    {{-- INFO ORDER END--}}
</div>

@endsection
