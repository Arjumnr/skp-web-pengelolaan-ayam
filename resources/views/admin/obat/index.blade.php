@extends('_partials.index')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam </strong>
                        <mark> *** : Lakukan Filter sebelum mencetak</mark>

                        {{-- <button type="button" id="createToExcel" class="btn btn-info btn-sm float-center" >Buat Laporan</button> --}}
                    </div>


                    <div class="card-body">
                        <table class="table table-bordered data-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Peternak</th>
                                    <th>Nama Obat</th>
                                    <th>Jumlah Obat</th>
                                    <th>Hari/Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->nama_obat }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.obat.js')
@endsection
