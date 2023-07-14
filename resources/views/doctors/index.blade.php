@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Contoh tutorial CRUD Laravel 9</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('doctors.create') }}"> Create Dokter</a>
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
                <th>Nama Dokter</th>
                <th>Kode Dokter</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Handphone</th>
                <th>Jenis Kelamin</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($doctors as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->nama_dokter }}</td>
                <td>{{ $row->kode_dokter }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->telepon }}</td>
                <td>{{ $row->handphone }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>
                    <form action="{{ route('doctors.destroy',$row->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('doctors.edit',$row->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you want to delete this data?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $doctors->links() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop