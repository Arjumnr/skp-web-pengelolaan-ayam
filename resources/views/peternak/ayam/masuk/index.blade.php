@extends('_layouts.index')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam Masuk</strong>
                        {{-- <a class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#mediumModal">Tambah Data</a> --}}
                        <button type="button" id="createData" class="btn btn-info btn-sm float-right" data-toggle="modal"
                            data-target="#mediumModal">Tambah Data</button>

                    </div>
                    {{-- Data table ayam masuk --}}
                    <div class="card-body">

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Jumlah</th>
                                    <th>Total Berat</th>
                                    <th>Umur</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        @include('peternak.ayam.masuk.modal')


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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



            $(document).on('click', '#createData', function() {
                console.log('create data');
                console.log($('#dataForm').serialize());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                //klik button save 
                $('#btnSave').click(function(e) {
                    e.preventDefault();
                    // $(this).html('Sending..');
                    $.ajax({
                        data: $('#dataForm').serialize(),
                        url: "{{ route('ayam-masuk.store') }}",
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

                $.get("{{ route('ayam-masuk.index') }}" + '/' + id + '/edit', function(data) {
                    console.log(data);
                    $('#modalHeading').html("Update Daya");
                    $('#btnSave').html("Update");
                    $('#id').val(data.id);
                    $('#nomor').val(data.nomor);
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
                            jumlah: $('#jumlah').val(),
                            total_berat: $('#total_berat').val(),
                            umur: $('#umur').val(),
                            created_at: $('#created_at').val(),
                        },
                        url: "{{ route('ayam-masuk.store') }}" + '/' + id,
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
                            url: "{{ route('ayam-masuk.store') }}" + '/' + id,
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
                        // .then(function(data) {
                        //     console.log(data);
                        //     // if (data.status == 'success') {
                        //     //     table.draw();
                        //     //     Swal.fire({
                        //     //         position: 'center',
                        //     //         icon: 'success',
                        //     //         title: 'Data berhasil dihapus',
                        //     //         showConfirmButton: false,
                        //     //         timer: 1500
                        //     //     })
                        //     // } else if (data.status == 'error') {
                        //     //     console.log(data.message);
                        //     // }
                        // })
                    }
                })


            });
        });
    </script>
@endsection
