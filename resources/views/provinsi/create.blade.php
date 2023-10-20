@extends('layouts.main')

@section('container')

<div class="card mt-5 col-8">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Provinsi Baru</h5>

<form method="post" action="/provinsi">
    @csrf

      <form class="row g-3">

        <div class="col-7 mt-3">
          <label for="provinsi" class="form-label">Nama Provinsi</label>
          <input type="text" class="form-control" id="provinsi" name="provinsi">
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>

    </div>

@endsection