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
            ajax: "{{ route('ayam-keluar.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nomor',
                    name: 'nomor'
                },
                {
                    data: 'nama_pembeli',
                    name: 'nama_pembeli'
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





        $(document).on('click', '#createData', function() {
            $('#modalHeading').html('Tambah Data Ayam Keluar');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //klik button save 
            $('#btnSave').click(function(e) {
                console.log('create data');
                console.log($('#dataForm').serialize());
                e.preventDefault();
                $(this).html('Sending..');
                $.ajax({
                    data: $('#dataForm').serialize(),
                    url: "{{ route('ayam-keluar.store') }}",
                    type: "POST",
                    dataType: 'json',
                }).then(function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        $('#dataForm').trigger("reset");
                        $('#mediumModal').modal('hide');
                        $('.modal-backdrop').remove();
                        //hapus tampilan gelap

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil ditambahkan',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            table.draw();

                        })


                    } else if (data.status == 'error') {
                        console.log(data.message);
                    }
                })
            });

        });


        $('body').on('click', '.editAyamMasuk', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).data('id');

            $.get("{{ route('ayam-keluar.index') }}" + '/' + id + '/edit', function(data) {
                console.log(data);
                $('#modalHeading').html("Update Data Ayam Keluar");
                $('#btnSave').html("Update");
                $('#id').val(data.id);
                $('#nomor').val(data.nomor);
                $('#nama_pembeli').val(data.nama_pembeli);
                $('#jumlah').val(data.jumlah);
                $('#total_berat').val(data.total_berat);
                $('#umur').val(data.umur);
                $('#created_at').val(data.created_at);
            })

            //klik close


            $('#btnSave').click(function(e) {
                e.preventDefault();
                $(this).html('Sending..');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    data: {
                        nomor: $('#nomor').val(),
                        nama_pembeli: $('#nama_pembeli').val(),
                        jumlah: $('#jumlah').val(),
                        total_berat: $('#total_berat').val(),
                        umur: $('#umur').val(),
                        created_at: $('#created_at').val(),
                    },
                    url: "{{ route('ayam-keluar.store') }}" + '/' + id,
                    type: "PUT",
                    dataType: 'json',
                }).then(function(data) {
                    console.log(data);
                    if (data.status == 'success') {
                        $('#dataForm').trigger("reset");
                        $('#mediumModal').modal('hide');
                        $('.modal-backdrop').remove();
                        //hapus tampilan gelap

                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Data berhasil diupdate',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            table.draw();

                        })
                    } else if (data.status == 'error') {
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Data gagal diupdate',
                            showConfirmButton: false,
                            timer: 1500

                        })
                    }
                })
            })
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
                    console.log(id);
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('ayam-keluar.store') }}" + '/' + id,
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
