@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Contoh tutorial CRUD Laravel 9</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('buyers.create') }}"> Create Pembeli</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Nama Pembeli</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Handphone</th>
                <th>Email</th>
                <th>Kode Dokter</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($buyers as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nama_pembeli }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->telepon }}</td>
                <td>{{ $row->handphone }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->kode_dokter }}</td>
                <td>
                    <form action="{{ route('buyers.destroy',$row->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('buyers.edit',$row->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you want to delete this data?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $buyers->links() !!}
        @endsection

        @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
        @stop

        @section('js')
        <script>
            console.log('Hi!');
        </script>
        @stop