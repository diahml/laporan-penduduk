@extends('layouts/main')

@section('container')
    <h1>Data Kabupaten</h1>
    <div class="card">
        <div class="card-body">
            <a href="/kabupaten/create" class="btn btn-primary mb-3">Tambah</a>
            <div class="tabel">
                <table>
                    <tr>
                        <td>
                            <tr>
                                <td>
                                    <label for="provinsi-filter">Filter Provinsi:</label>
                                    <select id="provinsi-filter">
                                        <option value="">Semua Provinsi</option>
                                        @foreach ($provinsi as $provinsi)
                                        <option value="{{ $provinsi->provinsi }}">{{ $provinsi->provinsi }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered datatable" id="myTable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Kabupaten</td>
                            <td>Provinsi</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kabupaten as $kabupaten)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kabupaten->kabupaten }}</td>
                            <td>{{ $kabupaten->provinsi->provinsi}}</td>
                            <td>
                                <a href="/kabupaten/{{ $kabupaten->id }}/edit" class="btn btn-warning mb-3">Edit</a>
                                <form action="/kabupaten/{{ $kabupaten->id }}" method="post" class="d-inline">
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