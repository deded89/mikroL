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
    <a class="breadcrumb-item" href="{{ route('admin.users.index') }}"><span class="badge badge-info p-1">User
            List</span></a>
    <span class="breadcrumb-item active">User Direct Permission</span>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Assign User Permission</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.users.assignPermissions',$user->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username',$user->username) }}" required autocomplete="username"
                                    autofocus disabled>
                            </div>
                        </div>

                        <h6>Give Permissions to User :</h6>
                        <div class="row pl-3">
                            <div class="custom-control custom-checkbox mb-2">
                                <input type="checkbox" class="custom-control-input" name="select-all" id="select-all">
                                <label class="custom-control-label font-weight-bold" for="select-all">Select
                                    All</label>
                            </div>
                            <div id="list-container">
                                @foreach($permissions as $key=>$permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input item" name="permissions[]"
                                        id="permission{{ $key }}" value="{{ $permission->name }}"
                                        @if($user->hasPermissionTo($permission->id)) checked @endif >
                                    <label class="custom-control-label"
                                        for="permission{{ $key }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row pt-3 mb-0 justify-content-center">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    // Slimscroll
    $(function () {
        $('#list-container').slimScroll({
            height: '250px',
            color: '#000000',
            width: '100%',
        });
    });

    // Listen for click on toggle checkbox
    $('#select-all').click(function (event) {
        if (this.checked) {
            $(':checkbox').prop('checked', true);
        } else {
            $(':checkbox').prop('checked', false);
        }
    });
    // centang select all jika semua cekbox dipilih
    $('.item').click(function (event) {
        cekCheckboxes();
    });

    $(document).ready(function () {
        cekCheckboxes();
    });

    function cekCheckboxes() {
        if ($('.item').length === $('.item:checked').length) {
            $('#select-all').prop('checked', true);
        } else {
            $('#select-all').prop('checked', false);
        }
    };

</script>
@endpush
