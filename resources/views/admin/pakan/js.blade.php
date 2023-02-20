<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // var table = $('.data-table').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: "{{ route('ayam.index') }}",
        //     columns: [{
        //             data: 'DT_RowIndex',
        //             name: 'DT_RowIndex'
        //         },
        //         {
        //             data: 'user.name',
        //             name: 'user.name'
        //         },
        //         {
        //             data: 'nomor',
        //             name: 'nomor'
        //         },
        //         {
        //             data: 'nama_pembeli',
        //             name: 'nama_pembeli'
        //         },
        //         {
        //             data: 'jumlah',
        //             name: 'jumlah'
        //         },
        //         {
        //             data: 'total_berat',
        //             name: 'total_berat'
        //         },
        //         {
        //             data: 'umur',
        //             name: 'umur'
        //         },
        //         {
        //             data: 'status',
        //             name: 'status'
        //         },
        //         {
        //             data: 'created_at',
        //             name: 'created_at'
        //         },

        //     ],
        // });

        $('#myTable thead tr').clone(true).appendTo('#myTable thead');
        $('#myTable thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');

            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        var table = $('#myTable').DataTable({
            orderCellsTop: true,
            fixedHeader: 'true',
            dom: 'Bfrtip',
            buttons: [{
                    title: 'Data Pakan',
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
                {
                    title: 'Data Pakan',
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },

                {
                    title: 'Data Pakan',
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6]
                    }
                },
            ]

        });

    });
</script>
