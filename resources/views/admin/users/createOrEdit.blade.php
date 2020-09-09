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
    <span class="breadcrumb-item active">User Form</span>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Form') }}</div>

                <div class="card-body">
                    @if($state == 'create')
                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @else
                        <form method="POST" action="{{ route('admin.users.updateRoles',$user->id) }}">
                            @endif
                            @csrf


                            <div class="form-group row">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old('username',$user->username) }}" required autocomplete="username"
                                        autofocus {{ $disabled }}>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @if ($state=='create')


                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email',$user->email) }}" required autocomplete="email"
                                        {{ $disabled }}>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" value="{{ $user->password }}"
                                        {{ $disabled }}>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        value="{{ $user->password }}" {{ $disabled }}>
                                </div>
                            </div>

                            @endif
                            <h6>Assign Roles to User :</h6>
                            <div class="row justify-content-around py-2">
                                @foreach($roles as $key=>$role)
                                <div class="custom-control custom-checkbox">
                                    @if($state == 'create')
                                    <input type="checkbox" class="custom-control-input" name="roles[]"
                                        id="role{{ $key }}" value="{{ $role->name }}">
                                    @else
                                    <input type="checkbox" class="custom-control-input" name="roles[]"
                                        id="role{{ $key }}" value="{{ $role->name }}"
                                        @if($userRoles->contains($role->name))
                                    checked
                                    @endif>
                                    @endif
                                    <label class="custom-control-label" for="role{{ $key }}">{{ $role->name }}</label>
                                </div>
                                @endforeach
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
