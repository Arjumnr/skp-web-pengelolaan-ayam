@extends('_partials.index')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam </strong>
                        {{-- <button type="button" id="createToExcel" class="btn btn-info btn-sm float-center" >Buat Laporan</button> --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table" id="myTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Peternak</th>
                                    <th>Nomor</th>
                                    <th>Nama Pembeli</th>
                                    <th>Jumlah</th>
                                    <th>Total Berat</th>
                                    <th>Umur</th>
                                    <th>Status</th>
                                    <th>Hari/Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->nomor }}</td>
                                        <td>{{ $item->nama_pembeli }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->total_berat }}</td>
                                        <td>{{ $item->umur }}</td>
                                        <td>{{ $item->status }}</td>
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
    @include('admin.ayam.js')
@endsection
