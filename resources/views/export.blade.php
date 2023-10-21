<!doctype html>
<html lang="en">
  <head>
    <style>
      #mainTable{
        border-collapse: collapse;
        width: 100%;
      }

      #mainTable td, #mainTable thead {
        border: 1px solid #ddd;
        padding: 8px;
      }
    </style>
  </head>
  <body>
    <div class="form-group">
        <h3 align="center"><b>Laporan Jumlah Penduduk</b></h3>
        <table class="table table-bordered" id="mainTable">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>NIK</td>
                    <td>Tanggal Lahir</td>
                    <td>Alamat</td>
                    <td>Jenis Kelamin</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $penduduk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $penduduk->nama }}</td>
                <td>{{ $penduduk->nik }}</td>
                <td>{{ \Carbon\Carbon::parse($penduduk->tgl_lahir)->format('d M Y') }}</td>
                <td>{{ $penduduk->alamat }}, {{ $penduduk->kabupaten->kabupaten }}, {{ $penduduk->kabupaten->provinsi->provinsi }}</td>
                <td>{{ $penduduk->jenis_kelamin }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>

  </body>
  
</html>