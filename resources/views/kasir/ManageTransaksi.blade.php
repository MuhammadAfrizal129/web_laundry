@extends('layouts.appkasir')

@section('content')
<form action=" {{ url('/kasir/datatransaksi' ,@$transaksi->id_transaksi) }} " method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="tanggal"
    value="<?php
            $tgl=date('Y-m-d');
            echo $tgl;
            ?>">
    Pelanggan
    <select name="member">
        @foreach($c_member as $row)
            <option value="{{ old('member' ,@$row->id_member) }}">{{ @$row->nama }}</option>
        @endforeach
    </select> <br>
    Paket
    <select name="paket">
        @foreach($c_paket as $row)
            <option value="{{ old('paket' ,@$row->id_paket) }}">{{ @$row->nama_paket }}</option>
        @endforeach
    </select> <br>
    Berat <input type="text" name="berat" value=" {{ old('berat', @$transaksi->berat) }} "> <br>
    Biaya Tambahan <input type="text" name="biaya_tambahan" value=" {{ old('biaya_tambahan', @$transaksi->biaya_tambahan) }} "> <br>
    Status Pesanan
    <select name="status_pesanan">
        @foreach($c_status_pesanan as $row)
            <option value="{{ old('status_pesanan' ,@$row->id_status_pesanan) }}">{{ @$row->nama_status_pesanan }}</option>
        @endforeach
    </select> <br>
    Status Pembayaran
    <select name="status_pembayaran">
        @foreach($c_status_pembayaran as $row)
            <option value="{{ old('status_pembayaran' ,@$row->id_status_pembayaran) }}">{{ @$row->nama_status_pembayaran }}</option>
        @endforeach
    </select> <br>
    <input type="hidden" name="tanggal_bayar"
    value="<?php
            $tgl=date('Y-m-d');
            echo $tgl;
            ?>">

<input type="submit" value="submit">

</form>

@endsection