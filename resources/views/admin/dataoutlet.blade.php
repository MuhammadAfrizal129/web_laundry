@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-5">
        <h3><center>Data Outlet</center></h3><br>
        <a href="{{url('admin/dataoutlet/create')}}" class="btn btn-success">Tambah Outlet</a>
        <br>
        <table id="datatable" class="cell-border compact stripe col-12">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No. Telepon</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1; 
                    @endphp
                    @foreach ($outlet as $item)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td class="text-center">{{$item->id_outlet}}</td>
                            <td class="text-center">{{$item->nama}}</td>
                            <td class="text-center">{{$item->alamat}}</td>
                            <td class="text-center">{{$item->tlp}}</td>
                            <td class="text-center">
                        
                                <a href="{{ url('admin/dataoutlet/' . $item->id_outlet )}}" class="btn btn-primary">Edit</a>
                                
                                
                                <a href="{{ url('admin/dataoutlet/' . $item->id_outlet . '/delete')}}" class="btn btn-danger">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
