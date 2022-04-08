@extends('layouts.layout')
@section('title', 'Detail Pembelian')
@section('content')
    @include('sweetalert::alert')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pembelian </h1>
        <!-- Button trigger modal -->
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr align="center">
                            <th>No Pembelian</th>
                            <th>Nama Bahan Baku </th>
                            <th>Jenis Pembayaran </th>
                            <th>Harga </th>
                            <th>Jumlah </th>
                            <th>Tanggal Pembayaran </th>
                            <th>Total </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penjualan_detail as $pd)
                            <tr align="center">
                                <td>{{ $pd->penjualan->no_penjualan }}</td>
                                <td>{{ $pd->finishgood->nama_fg }}</td>
                                <td>{{ $pd->jenis_pembayaran }}</td>
                                <td>@currency($pd->finishgood->harga) </td>
                                <td>{{ $pd->jumlah }}</td>
                                <td>{{ $pd->tanggal_pembayaran }}</td>
                                <td>@currency($pd->finishgood->harga * $pd->jumlah)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection