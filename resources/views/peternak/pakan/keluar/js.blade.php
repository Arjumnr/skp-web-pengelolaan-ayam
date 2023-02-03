<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pakan-keluar.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'keluar_ke',
                    name: 'keluar_ke'
                },
                
                {
                    data: 'jumlah',
                    name: 'jumlah'
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

        $('#createData').click(function() {
            $('#btnSave').html('Simpan');
            $('#data_id').val('');
            $('#dataForm').trigger("reset");
            $('#modalHeading').html("Tambah Data Ayam Keluar");
            $('#modalPakanKeluar').modal('show');
        });

        $('body').on('click', '.editPakanKeluar', function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btnSave').html('Update Data')

            var data_id = $(this).data('id');

            $.get("{{ route('pakan-keluar.index') }}" + '/' + data_id + '/edit', function(data) {
                console.log("data id = " + data.id);
                $('#modalHeading').html("Edit Data Ayam Masuk");
                $('#btnSave').val("edit-data");
                $('#modalPakanKeluar').modal('show');
                $('#data_id').val(data_id);
                $('#keluar_ke').val(data.keluar_ke);
                $('#jumlah').val(data.jumlah);
            })


        });

        $('#btnSave').click(function(e) {
            // console.log($('#dataForm').serialize());
            e.preventDefault();
            $(this).html('Sending..');
            $.ajax({
                data: $('#dataForm').serialize(),
                url: "{{ route('pakan-keluar.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    console.log(data);

                    $('#dataForm').trigger("reset");
                    $('#modalPakanKeluar').modal('hide');
                    $('.modal-backdrop').remove();

                    if (data.status == 'success') {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Berhasil',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            table.draw();
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Gagal',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            table.draw();

                        })
                    }
                },
                error: function(data) {
                    console.log('Error:', data);
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Data gagal ditambahkan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        });

        

        $('body').on('click', '.deletePakanKeluar', function() {

            var id = $(this).data("id");

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang d dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('pakan-keluar.store') }}" + '/' + id,
                        dataType: 'json',

                        success: function(data) {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Data berhasil dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                table.draw();
                            })
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Data gagal dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })

                }
            })


        });


    });

    
</script>
