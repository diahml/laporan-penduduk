@extends('layouts/main')

@section('container')
    <h1>Laporan Jumlah Penduduk</h1>
    <p>dalam aplikasi ini, Anda dapat melihat laporan jumlah penduduk di Indonesia berdasarkan kabupaten maupun provinsi.</p>

    <a href="/create" class="btn btn-primary mb-3">Tambah</a>
    <div class="tabel">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Aksi</td>
                    <td>Nama</td>
                    <td>NIK</td>
                    <td>Tanggal Lahir</td>
                    <td>Alamat</td>
                    <td>Jenis Kelamin</td>
                    <td>Timestamp</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($penduduk as $penduduk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="/{{ $penduduk->id }}/edit" class="btn btn-warning mb-3">Edit</a>
                    <form action="/{{ $penduduk->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger mb-3" onclick="return confirm('Apakah anda yakin untuk menghapus data?')">Hapus </button>
                    </form>
                </td>
                <td>{{ $penduduk->nama }}</td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ \Carbon\Carbon::parse($penduduk->tgl_lahir)->format('d M Y') }}</td>
                <td>{{ $penduduk->alamat }}, {{ $penduduk->kabupaten->kabupaten }}, {{ $penduduk->kabupaten->provinsi->provinsi }}</td>
                <td>{{ $penduduk->jenis_kelamin }}</td>
                <td>
                    {{-- <p>Created at : {{ $penduduk->created_at->format('Y-m-d H:i:s') }}</p>
                    <p>Updated at : {{ $penduduk->updated_at->format('Y-m-d H:i:s') }}</p> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection