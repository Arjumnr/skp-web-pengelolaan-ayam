@extends('_partials.index')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam </strong>
                        {{-- <button type="button" id="createData" class="btn btn-info btn-sm float-right" data-toggle="modal"
                            data-target="#mediumModal">Tambah Data</button> --}}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
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
                                    {{-- <th></th> --}}
                                </tr>
                            </thead>
                            <tbody>
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
