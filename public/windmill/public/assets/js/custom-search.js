    $(document).ready(function() {
        const wargaTable = $('#tabelWarga').DataTable({
            lengthMenu: [
                [10, 25, 50, -1],
                [10, 25, 50, 'All']
            ],
            order: [
                [1, 'asc']
            ]
        });

        // Menyembunyikan default search box DataTables
        $('.dataTables_filter').hide();

        // Menambahkan custom search input untuk nama
        $('<input type="text" id="customSearchInput" placeholder="Cari berdasarkan nama">').appendTo('#tabelWarga_wrapper .dataTables_filter');

        $('#customSearchInput').on('keyup', function() {
            wargaTable.column(1).search(this.value).draw();
        });
    });