@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-5">
    <h3><center>Data Member</center></h3><br>
        <a href="{{url('admin/datamember/create')}}" class="btn btn-success">Tambah Member</a>
        <br>
        <table id="datatable" class="cell-border compact stripe col-12">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Id</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Jenkel</th>
                    <th class="text-center">No. Telepon</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1; 
                    @endphp
                    @foreach ($member as $item)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td class="text-center">{{$item->id_member}}</td>
                            <td class="text-center">{{$item->nama}}</td>
                            <td class="text-center">{{$item->alamat}}</td>
                            <td class="text-center">{{$item->jenkel}}</td>
                            <td class="text-center">{{$item->no_tlp}}</td>
                            <td class="text-center">
                        
                                <a href="{{ url('admin/datamember/' . $item->id_member )}}" class="btn btn-primary">Edit</a>
                                
                                
                                <a href="{{ url('admin/datamember/' . $item->id_member .'/delete')}}" class="btn btn-danger">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
