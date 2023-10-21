$(document).ready(function() {
    var table = $('#mainTable').DataTable();
    var kabupatenFilter = $('#kabupaten-filter');
    var provinsiFilter = $('#provinsi-filter');

    kabupatenFilter.on('change', function () {
        var selectedKabupaten = kabupatenFilter.val();
        table.column(4).search(selectedKabupaten).draw();
    });

    provinsiFilter.on('change', function () {
          var selectedProvinsi = provinsiFilter.val();
          table.column(4).search(selectedProvinsi).draw();
    });
  });

function printpdf() {
     window.print();
}

function createxls(){
    let rows = document.getElementsByTagName('tr');

    let cells;
    let csv = "";

    let csvSeparator = ";"; // Sets the separator between fields
    let quoteField = true; // Adds quotes around fields

    let regex = /.*<img.*src="(.*?)"/i

    for (let row = 0; row < rows.length; row++) {
    cells = rows[row].getElementsByTagName('td');
    if (cells.length === 0) {
        cells = rows[row].getElementsByTagName('th');
    }
    for (let cell = 0; cell < cells.length; cell++) {
        if (quoteField) { csv += '"'; }
        
        if (regex.test(cells[cell].innerHTML)) {
        csv += cells[cell].innerHTML.match(regex)[1];
        } else {
        csv += cells[cell].innerText;
        }
        
        if (quoteField) { csv += '"'; }
        
        if (cell === cells.length - 1) {
        csv += "\n";
        } else {
        csv += csvSeparator;
        }
    }
}

function downloadToFile(content, filename, contentType) {
  const a = document.createElement('a');
  const file = new Blob([content], {type: contentType});
  
  a.href = URL.createObjectURL(file);
  a.download = filename;  
  a.click();
    URL.revokeObjectURL(a.href);
  
}

console.log(csv);

downloadToFile(csv, 'laporan-penduduk.csv', 'text/plain');
}