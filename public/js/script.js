
$(document).ready(function () {
    // Ketika pilihan provinsi berubah
    $('#provinsi_id').on('change', function () {
        var provinsiId = $(this).val();
        if (provinsiId) {
            // Mengambil data kabupaten berdasarkan ID provinsi
            $.ajax({
                url: '/create/get-kabupaten/' + provinsiId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').append('<option disabled selected value> -- pilih kabupaten -- </option>');
                    $.each(data, function (key, value) {
                        $('#kabupaten_id').append('<option value="' + value.id + '">' + value.kabupaten + '</option>');
                    });
                }
            });
        } else {
            // Jika tidak ada provinsi yang dipilih, kosongkan dropdown kabupaten
            $('#kabupaten_id').empty();
            $('#kabupaten_id').append('<option disabled selected value> -- pilih kabupaten -- </option>');
        }
    });
});
