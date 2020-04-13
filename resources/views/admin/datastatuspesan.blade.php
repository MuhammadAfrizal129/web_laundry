@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card p-5">
        <h3><center>Status Pembayaran</center></h3><br>
        <a href="{{url('admin/datastatuspesan/create')}}" class="btn btn-success">Tambah Status</a>
        <br>
        <table id="datatable" class="cell-border compact stripe col-12">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    
                    <th class="text-center">Nama Status</th>
                    <th class="text-center">Urutan</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                     $i = 1; 
                    @endphp
                    @foreach ($status_pesanan as $item)
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            
                            <td class="text-center">{{$item->nama_status_pesanan}}</td>
                            <td class="text-center">{{$item->urutan}}</td>
                            <td class="text-center">
                                <a href="{{ url('admin/datastatuspesan/' . $item->id_status_pesanan )}}" class="btn btn-primary">Edit</a>
                                
                                
                                <a href="{{ url('admin/datastatuspesan/' . $item->id_status_pesanan . '/delete')}}" class="btn btn-danger">Delete</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection
