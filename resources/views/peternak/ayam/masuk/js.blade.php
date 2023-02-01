

<script type="text/javascript">

    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ayam-masuk.index') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'nomor',
                name: 'nomor'
            },
            {
                data: 'jumlah',
                name: 'jumlah'
            },
            {
                data: 'total_berat',
                name: 'total_berat'
            },
            {
                data: 'umur',
                name: 'umur'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    });

    // $('#createData').click(function() {
    //     $('#btnSave').val("create-ayam-masuk");
    //     $('#id').val('');
    //     // $('#dataForm').trigger("reset");
    //     $('#modalHeading').html("Tambah Data Ayam Masuk");
    //     //show modal .modal not function
    //     $('#modalId').modal('hide');

    // });

    $(document).on('click', '#createData', function() {
        // $('#btnSave').val("create-ayam-masuk");
        // $('#id').val('');
        console.log('create');
        $('#dataForm').trigger("reset");
        $('#modalHeading').html("Tambah Data Ayam Masuk");
        $('#exampleModal').modal('show');
    });

   
    $('body').on('click', '.deleteAyamMasuk', function() {

        var id = $(this).data("id");
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang q dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ route('ayam-masuk.store') }}" + '/' + id,
                    success: function(data) {
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
                Swal.fire(
                    'Terhapus!',
                    'Data berhasil dihapus.',
                    'success'
                )
            }
        })


    });
</script>

