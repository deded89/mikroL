@extends('layouts.admin.app')
@section('breadcrumb')
<div class="pd-t-5 pd-b-5">
    <h1 class="pd-0 mg-0 tx-20 tx-dark">User Management</h1>
</div>
<div class="breadcrumb pd-0 mg-0">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">
        <i class="icon ion-ios-home-outline"></i>
        <span class=" badge badge-info p-1">Admin Dashboard</span></a>
    {{-- <a class="breadcrumb-item" href="">Roles & Permissions</a> --}}
    <span class="breadcrumb-item">Authorization</span>
    <span class="breadcrumb-item active">User List</span>
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


        <a href="{{ route('admin.users.create') }}" role="button" class="btn btn-outline-primary rounded-pill mb-2">
            New Users
        </a>
        <div class="card mg-b-30">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-header-title tx-13 mb-0">Users List</h6>
                    </div>
                </div>
            </div>
            <div class="card-body pd-0">
                <table id="foo-accordion" class="table toggle-circle-filled">
                    <thead>
                        <tr>
                            <th data-toggle"true">#</th>
                            <th>Username</th>
                            <th data-hide="phone">Role</th>
                            <th data-hide="all">Direct Permission</th>
                            <th data-hide="phone">Email</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $key }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @foreach($user->getRoleNames() as $rolename)
                                <span class="badge badge-info">{{ $rolename }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach ( $user->getDirectPermissions() as $permission )
                                <span class="badge badge-dark">{{ $permission->name }}</span> <br>
                                @endforeach
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="d-flex justify-content-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-custom-white dropdown-toggle mx-1"
                                        id="dropdown-menu-button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" type="button" title="Edit Roles & Permission">
                                        <i class="fa fa-unlock-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdown-menu-button">
                                        <a href="{{ route('admin.users.editRoles',$user->id) }}"
                                            class="dropdown-item">Edit Roles</a>
                                        <a href="{{ route('admin.users.userPermissions',$user->id) }}"
                                            class="dropdown-item">Edit Permissions</a>
                                    </div>

                                </div>
                                <form action="{{ route('admin.users.destroy',$user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-custom-white" type="submit" title="Delete User">
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
@endsection

@push('css')
<!-- footable CSS -->
<link type="text/css" rel="stylesheet" href="{{ asset('') }}plugins/footable/footable.core.css">
@endpush
@push('js')
<!-- footable Script -->
<script src="{{ asset('') }}plugins/footable/footable.all.min.js">
</script>
@endpush
@push('script')
<script>
    // Accordion
    $('#foo-accordion').footable().on('footable_row_expanded', function (e) {
        $('#foo-accordion tbody tr.footable-detail-show').not(e.row).each(function () {
            $('#foo-accordion').data('footable').toggleDetail(this);
        });
    });

</script>
@endpush
