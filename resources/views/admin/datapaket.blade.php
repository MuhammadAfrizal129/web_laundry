@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-5">
        <h3><center>Data Paket</center></h3><br>
        <a href="{{url('admin/datapaket/create')}}" class="btn btn-success">Tambah Paket</a>
        <br>
        <table id="datatable" class="cell-border compact stripe col-12">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id</th>
                    <th class="text-center">Outlet</th>
                    <th class="text-center">Jenis</th>
                    <th class="text-center">Nama Paket</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1; 
                    @endphp
                    @foreach ($paket as $item)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td class="text-center">{{$item->id_paket}}</td>
                            <td class="text-center">{{$item->id_outlet}}</td>
                            <td class="text-center">{{$item->jenis}}</td>
                            <td class="text-center">{{$item->nama_paket}}</td>
                            <td class="text-center">{{$item->harga}}</td>
                            <td class="text-center">
                        
                                <a href="{{ url('admin/datapaket/' . $item->id_paket )}}" class="btn btn-primary">Edit</a>
                                
                                
                                <a href="{{ url('admin/datapaket/' . $item->id_paket . '/delete')}}" class="btn btn-danger">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
