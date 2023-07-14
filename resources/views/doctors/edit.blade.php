@extends('adminlte::page')

@section('title', 'Edit')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Dokter</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('doctors.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('doctors.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Dokter:</strong>
                        <input type="text" name="nama_dokter" value="{{ $doctor->nama_dokter }}" class="form-control" placeholder="Nama Dokter">
                        @error('nama_dokter')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Kode Dokter:</strong>
                        <input type="text" name="kode_dokter" class="form-control" placeholder="Kode Dokter" value="{{ $doctor->kode_dokter }}">
                        @error('kode_dokter')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        <input type="text" name="alamat" value="{{ $doctor->alamat }}" class="form-control" placeholder="Alamat">
                        @error('alamat')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Telepon:</strong>
                        <input type="number" name="telepon" value="{{ $doctor->telepon }}" class="form-control" placeholder="Telepon">
                        @error('telepon')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Handphone:</strong>
                        <input type="number" name="handphone" value="{{ $doctor->handphone }}" class="form-control" placeholder="Handphone">
                        @error('handphone')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis Kelamin:</strong>
                        <input type="text" name="jenis_kelamin" value="{{ $doctor->jenis_kelamin }}" class="form-control" placeholder="Jenis Kelamin">
                        @error('jenis_kelamin')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop