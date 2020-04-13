@extends('layouts.app')

@section('content')
<center><h1>Manage Status Pembayaran</h1></center>
<form action=" {{ url('/admin/datastatuspesan' ,@$status_pesanan->id_status_pesanan) }} " method="POST">
    {{ csrf_field() }}
    Id :<input type="text" name="id_status_pesanan" value="{{ old('id_status_pesanan', @$status_pesanan->id_status_pesanan) }}"> <br>
    Nama Status : <input type="text" name="nama_status_pesanan" value="{{ old('nama_status_pesanan', @$status_pesanan->nama_status_pesanan) }}"> <br>
    Urutan : <input type="text" name="urutan" value="{{ old('urutan', @$status_pesanan->urutan) }}"> <br>
    <input type="submit" value="submit">
</form>
@endsection