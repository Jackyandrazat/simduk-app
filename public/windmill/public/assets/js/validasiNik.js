$(document).ready(function() {
    $('#nikInput').on('input', function() {
        const nikInput = document.getElementById("nikInput");
        const nikError = document.getElementById("nik-error");

        const nik = $(this).val();
        const apiUrl = "{{ route('checkNik') }}";

        fetch(`${apiUrl}?nik=${nik}`)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    nikError.textContent = "NIK sudah ada dalam database.";
                } else {
                    nikError.textContent = "";
                }
            });
    });

    // Lainnya script-interaksi Anda
});
