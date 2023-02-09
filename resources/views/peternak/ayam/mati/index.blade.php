@extends('_layouts.index')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam Keluar</strong>
                        <button type="button" id="createData" class="btn btn-info btn-sm float-right" data-toggle="modal"
                            data-target="#mediumModal">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jumlah</th>
                                    <th>Hari/Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        @include('peternak.ayam.mati.modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('peternak.ayam.mati.js')
@endsection
