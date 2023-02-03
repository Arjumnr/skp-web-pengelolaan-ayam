@extends('_layouts.index')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Ayam Masuk</strong>
                        <button type="button" href="javascript:void(0)" class="btn btn-info btn-sm float-right" id="createData">Tambah Data</button>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nomor</th>
                                    <th>Jumlah (Ekor)</th>
                                    <th>Total Berat (Kg)</th>
                                    <th>Umur (Tahun)</th>
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
<script>
    
</script>
    @include('peternak.ayam.masuk.js')
@endsection
