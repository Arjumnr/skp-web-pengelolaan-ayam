@extends('_layouts.index')
@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam Masuk</strong>
                        <a href="" data-toggle="modal" data-target="#mediumModal"
                            class="btn btn-primary btn-sm float-right">Tambah Data</a>
                    </div>
                    {{-- Data table ayam masuk --}}
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Jumlah</th>
                                    <th>Total Berat</th>
                                    <th>Umur</th>
                                    <th>Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->nomor }}</td>
                                        <td>{{ $value->jumlah }}</td>
                                        <td>{{ $value->total_berat }}</td>
                                        <td>{{ $value->umur }}</td>
                                        <td>{{ $value->created_at->format('d-m-Y') }}</td>
                                        <td class="d-flex justify-content-around">
                                            <a data-toggle="modal" data-target="#mediumModal"
                                                data-attr="{{ route('showAyamMasuk', $value->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                @endforeach
                        </table>
                        @include('peternak.ayam.masuk.modal')
                        @include('peternak.ayam.masuk.js')


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
