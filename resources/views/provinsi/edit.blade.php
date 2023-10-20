@extends('layouts.main')

@section('container')

<div class="card mt-5 col-8">
    <div class="card-body">
      <h5 class="card-title">Update Data Provinsi</h5>

<form method="post" action="/provinsi/{{ $provinsi->id }}">
    @method('put')
    @csrf

      <form class="row g-3">

        <div class="col-7 mt-3">
          <label for="kelas" class="form-label">Nama Provinsi</label>
          <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi" value="{{  $provinsi->provinsi}}">
        </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>

    </div>

@endsection