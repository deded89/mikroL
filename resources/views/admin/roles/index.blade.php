@extends('layouts.admin.app')
@section('breadcrumb')
<div class="pd-t-5 pd-b-5">
    <h1 class="pd-0 mg-0 tx-20 tx-dark">Role Management</h1>
</div>
<div class="breadcrumb pd-0 mg-0">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">
        <i class="icon ion-ios-home-outline"></i>
        <span class=" badge badge-info p-1">Admin Dashboard</span></a>
    {{-- <a class="breadcrumb-item" href="">Roles & Permissions</a> --}}
    <span class="breadcrumb-item">Roles & Permissions</span>
    <span class="breadcrumb-item active">Roles List</span>
</div>
@endsection
@section('content')
<div>
    <div class="col-md-12 col-lg-12 d-flex flex-column">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="button" class="btn btn-outline-primary rounded-pill mb-2" data-toggle="modal"
            data-target="#createModal">New Role</button>
        <div class="card mg-b-30">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-header-title tx-13 mb-0">Roles List</h6>
                    </div>
                </div>
            </div>
            <div class="card-body pd-0">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $key => $role)
                        <tr>
                            <th scope="row">{{ $roles->firstItem() + $key }}</th>
                            <td>{{ $role->name }}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{ route('admin.roles.rolePermissions',$role->id) }}"
                                    class="btn btn-sm btn-custom-white mr-1" role="button"><i
                                        class="fa fa-unlock-alt"></i></a>
                                <form action="{{ route('admin.roles.destroy',$role->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-custom-white" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.roles.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="name" class="form-control" autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
