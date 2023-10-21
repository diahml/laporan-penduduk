<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="Content-Security-Policy" content="script-src 'self' 'unsafe-inline'"> --}}
    <title>Laporan Jumlah Penduduk | {{ $title }}</title>

  {{-- Datatables --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="/">Laporan Jumlah Penduduk</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link {{ ($title === "Provinsi")? 'active' :'' }}" aria-current="page" href="/provinsi">Provinsi</a>
              <a class="nav-link {{ ($title === "Kabupaten")? 'active' :'' }}" href="/kabupaten">Kabupaten</a>
            </div>
          </div>
        </div>
      </nav>

      <div class="container">
        @yield('container')
      </div>

      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    {{-- Datatables --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>

    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

      $(document).ready(function() {
        var table = $('#myTable').DataTable();
        var provinsiFilter = $('#provinsi-filter');

        provinsiFilter.on('change', function () {
            var selectedProvinsi = provinsiFilter.val();
            table.column(2).search(selectedProvinsi).draw();
        });
      });

      $(document).ready( function () {
          $('#mainTable').DataTable();
      } );

      $(document).ready(function() {
        var table = $('#mainTable').DataTable();
        var kabupatenFilter = $('#kabupaten-filter');
        var provinsiFilter = $('#provinsi-filter');

        kabupatenFilter.on('change', function () {
            var selectedKabupaten = kabupatenFilter.val();
            table.column(5).search(selectedKabupaten).draw();
        });

        provinsiFilter.on('change', function () {
              var selectedProvinsi = provinsiFilter.val();
              table.column(5).search(selectedProvinsi).draw();
        });
      });

      </script>
  </body>
  
</html>