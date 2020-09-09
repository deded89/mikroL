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
<h1>Admin Dashboard</h1>
@endsection
