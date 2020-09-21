@extends('layouts.user.app')

@section('title','cabang')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">

        {{-- VALIDATION ERROR MESSAGE --}}
        @if ($errors->any())
        <div class="alert validation alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-md-8">

            {{-- STATE CHECKING EDIT OR CREATE --}}
            @if (isset($state))
            <form action="{{ route('cabangs.update',$cabang->id) }}" method="POST">
                @method('PATCH')
                @else
                <form action="{{ route('cabangs.store') }}" method="POST">
                    @endif

                    {{-- THE FORM --}}
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Cabang</label>
                                <input name="nama_cabang" type="text" class="form-control" autofocus
                                    value="{{ old('nama_cabang',$cabang->nama_cabang) }}">
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('cabangs.index') }}" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
