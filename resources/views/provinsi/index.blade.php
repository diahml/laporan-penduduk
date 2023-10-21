@extends('layouts/main')

@section('container')
    <h1>Data Provinsi</h1>

    <div class="card">
        <div class="card-body">
            <div class="tabel">
                <a href="/provinsi/create" class="btn btn-primary mb-3">Tambah</a>
                <table class="table table-bordered datatable" id="myTable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Provinsi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($provinsi as $provinsi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $provinsi->provinsi }}</td>
                            <td>
                                <a href="/provinsi/{{ $provinsi->id }}/edit" class="btn btn-warning mb-3">Edit</a>
                                <form action="/provinsi/{{ $provinsi->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger mb-3" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Hapus </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection