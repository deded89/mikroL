@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('register') }}">
                    <div class="card-body d-flex justify-content-center">
                        <div class="col-md-10">

                            @csrf

                            <div class="form-group row">
                                {{-- <label for="username"
                                class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label> --}}

                                {{-- <div class="col-md-6"> --}}
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" required autocomplete="username" autofocus
                                    placeholder="Username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row">
                                {{-- <label for="email" class="col-md-4 col-form-label text-md-right">Alamat Email</label> --}}

                                {{-- <div class="col-md-6"> --}}
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- </div> --}}
                            </div>


                            <div class="form-group row">
                                {{-- <label for="prefix" class="col-md-4 col-form-label text-md-right">Panggilan</label> --}}

                                {{-- <div class="col-md-6"> --}}

                                <select name="prefix" class="form-control @error('nama') is-invalid @enderror" required>
                                    <option value="" disabled selected>Panggilan</option>
                                    <option value="bapak">Bapak</option>
                                    <option value="ibu">Ibu</option>
                                </select>

                                @error('prefix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- </div> --}}
                            </div>


                            <div class="form-group row">
                                {{-- <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label> --}}

                                {{-- <div class="col-md-6"> --}}
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" required autocomplete="nama"
                                    placeholder="Nama Lengkap">

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password" class="col-md-4 col-form-label text-md-right">Password</label> --}}

                                {{-- <div class="col-md-6"> --}}
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row">
                                {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi
                                Password</label> --}}

                                {{-- <div class="col-md-6"> --}}
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Ulangi Password">
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row mb-0">
                                {{-- <div class="col-md-6 offset-md-4"> --}}
                                <button type="submit" class="btn btn-primary">
                                    Daftar
                                </button>
                                {{-- </div> --}}
                            </div>

                            <div class="form-group row mb-0 mt-3">
                                {{-- <div class="col-md-6 offset-md-4"> --}}
                                Sudah Punya Akun ?
                                <a href="{{ route('login') }}">
                                    Login Disini
                                </a>
                                {{-- </div> --}}
                            </div>

                        </div>
                    </div>{{--  card-body --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
