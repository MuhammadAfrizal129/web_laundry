@extends('layouts.app')

@section('content')
<center><h1>Manage Paket</h1></center>
<form action=" {{ url('/admin/datapaket' ,@$paket->id_paket) }} " method="POST">
    {{ csrf_field() }}
    Outlet :<input type="text" name="id_outlet" value="{{ old('id_outlet', @$paket->id_outlet) }}"> <br>
    Jenis : <input type="text" name="jenis" value="{{ old('jenis', @$paket->jenis) }}"> <br>
    Nama : <input type="text" name="nama_paket" value="{{ old('nama_paket', @$paket->nama_paket) }}"> <br>
    Harga : <input type="text" name="harga" value=" {{ old('harga', @$paket->harga) }} "> <br>
    <input type="submit" value="submit">
</form>
@endsection