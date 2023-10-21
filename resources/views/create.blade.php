@extends('layouts.main')

@section('container')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>

<div class="card mt-5 col-15">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Penduduk Baru</h5>

<form method="post" action="/">
    @csrf

      <form class="row g-3">

        <div class="col-7 mt-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="col-7 mt-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" required>
        </div>

        <div class="col-7 mt-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
            <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan" required>
            <label for="perempuan">Perempuan</label><br>
            <input type="radio" id="laki-laki" name="jenis_kelamin" value="Laki-Laki" required>
            <label for="laki-laki">Laki-Laki</label>
        </div>

        <div class="col-7 mt-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
        </div>

        <div class="col-7 mt-3">
            <label for="alamat" class="form-label">Alamat</label><br>
            <textarea id="alamat" name="alamat" rows="4" cols="50" required> </textarea>
        </div>

        <div class="col-7 mt-3">
            <label for="provinsi_id" class="form-label">Provinsi</label><br>
            <select class="form-select" id="provinsi_id" name="provinsi_id" required>
            <option disabled selected value> -- pilih provinsi -- </option>
            @foreach ($provinsi as $provinsi)
            <option value="{{ $provinsi->id }}">{{ $provinsi->provinsi }}</option>
            @endforeach
            </select>
        </div>

        <div class="col-7 mt-3">
            <label for="kabupaten_id" class="form-label" >Kabupaten</label><br>

            <select class="form-select" id="kabupaten_id" name="kabupaten_id">
                <option disabled selected value> -- pilih kabupaten -- </option>
                
            </select>
        </div>


        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>

    </div>

    

@endsection