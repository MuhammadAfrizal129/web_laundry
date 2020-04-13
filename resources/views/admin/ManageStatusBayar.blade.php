@extends('layouts.app')

@section('content')
<center><h1>Manage Status Pembayaran</h1></center>
<form action=" {{ url('/admin/datastatusbayar' ,@$status_pembayaran->id_status_pembayaran) }} " method="POST">
    {{ csrf_field() }}
    Id :<input type="text" name="id_status_pembayaran" value="{{ old('id_status_pembayaran', @$status_pembayaran->id_status_pembayaran) }}"> <br>
    Nama Status : <input type="text" name="nama_status_pembayaran" value="{{ old('nama_status_pembayaran', @$status_pembayaran->nama_status_pembayaran) }}"> <br>
    Urutan : <input type="text" name="urutan" value="{{ old('urutan', @$status_pembayaran->urutan) }}"> <br>
    <input type="submit" value="submit">
</form>
@endsection