@extends('layouts.admin.app')
@section('breadcrumb')
<div class="pd-t-5 pd-b-5">
    <h1 class="pd-0 mg-0 tx-20 tx-dark">Dashboard</h1>
</div>
<div class="breadcrumb pd-0 mg-0">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">
        <i class="icon ion-ios-home-outline"></i>
        <span class=" badge badge-info p-1">Admin Dashboard</span></a>
</div>
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-6 col-md-6 col-lg-3">
        <div class="card mg-b-30">
            <div class="card-body">
                <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mb-2"> jumlah Roles</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{ $rolesCount }}</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
        <div class="card mg-b-30">
            <div class="card-body">
                <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mb-2"> jumlah permissions</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{ $permissionsCount }}</h2>
                </div>

            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
        <div class="card mg-b-30">
            <div class="card-body">
                <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mb-2"> jumlah user</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{ $usersCount }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-6 col-lg-3">
        <div class="card mg-b-30">
            <div class="card-body">
                <h5 class="tx-uppercase tx-spacing-1 tx-semibold tx-10 mb-2"> new user this week</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="tx-20 tx-sm-18 tx-md-24 mg-b-0 tx-rubik tx-dark tx-normal">{{ $thisWeekUserCount }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
