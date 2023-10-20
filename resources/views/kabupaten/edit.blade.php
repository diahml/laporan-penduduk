@extends('layouts.main')

@section('container')

<div class="card mt-5 col-8">
    <div class="card-body">
      <h5 class="card-title">Tambah Data Kabupaten Baru</h5>

<form method="post" action="/kabupaten/{{ $kabupaten->id }}">
    @method('put')
    @csrf

      <form class="row g-3">

        <div class="col-7 mt-3">
          <label for="kabupaten" class="form-label">Nama Kabupaten</label>
          <input type="text" class="form-control" id="kabupaten" name="kabupaten" value="{{  $kabupaten->kabupaten}}"">
        </div>
        
        <div class="col-7 mt-3">
            <label for="provinsi_id" class="form-label">Nama Provinsi</label>
            <select class="form-select @error('provinsi_id') is-invalid"
                
            @enderror aria-label="Default select example" id="provinsi_id" name="provinsi_id">
            <option selected value="{{ $kabupaten->provinsi->id }}"> {{ $kabupaten->provinsi->provinsi }} </option>
            @foreach ($provinsi as $provinsi)
            <option value="{{ $provinsi->id }}">{{ $provinsi->provinsi }}</option>
            @endforeach
            </select>
            </div>

        <div class="mt-3">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>

    </div>

@endsection