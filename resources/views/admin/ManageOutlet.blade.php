@extends('layouts.app')

@section('content')
<center><h1>Manage Member</h1></center>
<form action=" {{ url('/admin/dataoutlet' ,@$outlet->id_outlet) }} " method="POST">
    {{ csrf_field() }}
    Nama : <input type="text" name="nama" value="{{ old('nama', @$outlet->nama) }}"> <br>
    Alamat : <input type="text" name="alamat" value=" {{ old('alamat', @$outlet->alamat) }} "> <br>
    No TLP : <input type="text" name="tlp" value=" {{ old('tlp', @$outlet->tlp) }} "> <br>
    <input type="submit" value="submit">
</form>
@endsection