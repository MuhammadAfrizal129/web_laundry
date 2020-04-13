@extends('layouts.appkasir')
@section('content')
<div class="container">
    <div class="card p-5">
        <h3><center>Data Transaksi</center></h3><br>
        <a href="{{url('kasir/datatransaksi/create')}}" class="btn btn-success">Entry Transaksi</a>
        <br>
        <table id="datatable" class="cell-border compact stripe col-12">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Member</th>
                    <th class="text-center">Paket</th>
                    <th class="text-center">Berat (KG)</th>
                    <th class="text-center">Biaya Tambahan</th>
                    <th class="text-center">Harga Total</th>
                    <th class="text-center">Status Pesanan</th>
                    <th class="text-center">Status Pembayaran</th>
                    <th class="text-center">Tanggal Bayar</th>
                    <th class="text-center">Update Status</th>
                    <th class="text-center"></th>
                  </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1; 
                    @endphp
                    @foreach ($transaksi as $item)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td class="text-center">{{$item->id_transaksi}}</td>
                            <td class="text-center">{{$item->tanggal}}</td>
                            <td class="text-center">{{$item->nama}}</td>
                            <td class="text-center">{{$item->nama_paket}}</td>
                            <td class="text-center">{{$item->berat}}</td>
                            <td class="text-center">{{$item->biaya_tambahan}}</td>
                            <td class="text-center">{{$item->harga_total}}</td>
                            <td class="text-center">{{$item->nama_status_pesanan}}</td>
                            <td class="text-center">{{$item->nama_status_pembayaran}}</td>
                            <td class="text-center">{{$item->tanggal_bayar}}</td>
                            <td class="text-center">
                        
                                <a href="{{ url('kasir/datatransaksi/naikkan_status/'.$item->id_transaksi) }}" class="btn btn-primary">Pesanan</a>
                                
                                
                                <a href="{{ url('kasir/datatransaksi/naikkan_status_pembayaran/'.$item->id_transaksi) }}" class="btn btn-info">Bayar</a>
                                
                            </td>
                            <td class="text-center">
                                <a href="{{ url('kasir/datatransaksi/' . $item->id_transaksi . '/delete') }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
                
        </table>
        <br>
    </div>
</div>
@endsection
