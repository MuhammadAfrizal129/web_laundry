@extends('layouts.appkasir')

@section('content')
<center><h1>Manage Member</h1></center>
<form action=" {{ url('/kasir/datamember' ,@$member->id_member) }} " method="POST">
    {{ csrf_field() }}
    Nama : <input type="text" name="nama" value="{{ old('nama', @$member->nama) }}"> <br>
    Alamat : <input type="text" name="alamat" value=" {{ old('alamat', @$member->alamat) }} "> <br>
    Jenkel : <input type="text" name="jenkel" value=" {{ old('jenkel', @$member->jenkel) }} "> <br>
    No TLP : <input type="text" name="no_tlp" value=" {{ old('no_tlp', @$member->no_tlp) }} "> <br>
    <input type="submit" value="submit">
</form>
@endsection