@extends('_layouts.index')
@section('content')
    <div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Orders</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Data Ayam</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Ayam Masuk</li>
                </ol>
            </nav>
        </div>
        <div class="mt-2 mt-md-0">
            <div class="dropdown">
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-settings mr-2"></i> Actions
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Ayam</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Ayam</th>
                                    <th>Jenis Ayam</th>
                                    <th>Jumlah Ayam</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Keluar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($ayam as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $item->nama_ayam }}</td>
                                        <td>{{ $item->jenis_ayam }}</td>
                                        <td>{{ $item->jumlah_ayam }}</td>
                                        <td>{{ $item->tanggal_masuk }}</td>
                                        <td>{{ $item->tanggal_keluar }}</td>
                                        <td>
                                            <div class="badge badge-success">Active</div>
                                        </td>
                                        <td>
                                            <a href="{{ route('ayam.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('ayam.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
