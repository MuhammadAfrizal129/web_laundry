<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Status_pesanan;
use App\Models\Status_pembayaran;
use App\Models\Transaksi;

class TransaksiController extends Controller{
    public function showData()
    {
        $data['transaksi'] = \DB::table('transaksi')
        ->join('member','member.id_member','=','transaksi.member')
        ->join('paket','paket.id_paket','=','transaksi.paket')
        ->join('status_pesanan','status_pesanan.id_status_pesanan','=','transaksi.status_pesanan')
        ->join('status_pembayaran','status_pembayaran.id_status_pembayaran','=','transaksi.status_pembayaran')
        ->get();
        return view("admin/datatransaksi",$data);
    }

    public function create(){
        $c_member = \DB::table('member')->get();
        $c_paket = \DB::table('paket')->get();
        $c_status_pesanan = \DB::table('status_pesanan')->get();
        $c_status_pembayaran = \DB::table('status_pembayaran')->get();
        // dd($combo);
        return view("admin/ManageTransaksi", compact('c_member', 'c_paket', 'c_status_pembayaran', 'c_status_pesanan'));


    }
    public function tambah(Request $request){

        $this->validate($request,[
    		'member'=>'required',
    		'paket'=>'required',
            'berat'=>'required',
            'biaya_tambahan' => 'required',
    		'status_pesanan'=>'required',
    		'status_pembayaran'=>'required'
    	]);

        //$data['id_transaksi'] = \Uuid::generate(4);
        $data['tanggal'] = $request->tanggal;
    	$data['member'] = $request->member;
    	$data['paket'] = $request->paket;
        $data['berat'] = $request->berat;
        $data['biaya_tambahan'] = $request->biaya_tambahan;
    	$data['status_pembayaran'] = $request->status_pembayaran;
        $data['status_pesanan'] = $request->status_pesanan;
        $data['tanggal_bayar'] = $request->tanggal_bayar;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	$harga = Paket::find($request->paket);
    	$harga_paket = $harga->harga;
        $berat = $request->berat;
        $biaya_tambahan = $request->biaya_tambahan;

    	$harga_total = ($harga_paket * $berat) + $biaya_tambahan;

    	$data['harga_total'] = $harga_total;

    	$status =\DB::table('transaksi')->insert($data);

    	if($status){
            return redirect("/admin/datatransaksi")->with('success', " data berhasil di input");
        }else{
            return redirect('admin/datatransaksi/create')->with('error', " data gagal di input");
        }
    }

    public function naikkan_status($id_transaksi){
        try {
            $transaksi = Transaksi::find($id_transaksi);
            $id_status = $transaksi->status_pesanan;
            $urutan_status = $transaksi->status_pesanans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pesanan::where('urutan',$urutan_baru)->first();

            Transaksi::where('id_transaksi',$id_transaksi)->update([
                'status_pesanan'=>$status_baru->id_status_pesanan
            ]);

            \Session::flash('sukses','Status berhasil dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function naikkan_status_pembayaran($id_transaksi){
        try {
            $transaksi = Transaksi::find($id_transaksi);
            $id_status = $transaksi->status_pembayaran;
            $urutan_status = $transaksi->status_pembayarans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pembayaran::where('urutan',$urutan_baru)->first();

            Transaksi::where('id_transaksi',$id_transaksi)->update([
                'status_pembayaran'=>$status_baru->id_status_pembayaran
            ]);

            \Session::flash('sukses','Status berhasil dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function destroy(Request $request, $id_transaksi)
    {
        $result = \DB::table('transaksi')->where('id_transaksi', $id_transaksi)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datatransaksi')->with('error', 'Data Gagal Dihapus');
    }

//kasir

    public function showDataKasir()
    {
        $data['transaksi'] = \DB::table('transaksi')
        ->join('member','member.id_member','=','transaksi.member')
        ->join('paket','paket.id_paket','=','transaksi.paket')
        ->join('status_pesanan','status_pesanan.id_status_pesanan','=','transaksi.status_pesanan')
        ->join('status_pembayaran','status_pembayaran.id_status_pembayaran','=','transaksi.status_pembayaran')
        ->get();
        return view("kasir/datatransaksi",$data);
    }

    public function createKasir(){
        $c_member = \DB::table('member')->get();
        $c_paket = \DB::table('paket')->get();
        $c_status_pesanan = \DB::table('status_pesanan')->get();
        $c_status_pembayaran = \DB::table('status_pembayaran')->get();
        // dd($combo);
        return view("kasir/ManageTransaksi", compact('c_member', 'c_paket', 'c_status_pembayaran', 'c_status_pesanan'));


    }
    public function tambahKasir(Request $request){

        $this->validate($request,[
    		'member'=>'required',
    		'paket'=>'required',
            'berat'=>'required',
            'biaya_tambahan' => 'required',
    		'status_pesanan'=>'required',
    		'status_pembayaran'=>'required'
    	]);

        //$data['id_transaksi'] = \Uuid::generate(4);
        $data['tanggal'] = $request->tanggal;
    	$data['member'] = $request->member;
    	$data['paket'] = $request->paket;
        $data['berat'] = $request->berat;
        $data['biaya_tambahan'] = $request->biaya_tambahan;
    	$data['status_pembayaran'] = $request->status_pembayaran;
        $data['status_pesanan'] = $request->status_pesanan;
        $data['tanggal_bayar'] = $request->tanggal_bayar;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	$harga = Paket::find($request->paket);
    	$harga_paket = $harga->harga;
        $berat = $request->berat;
        $biaya_tambahan = $request->biaya_tambahan;

    	$harga_total = ($harga_paket * $berat) + $biaya_tambahan;

    	$data['harga_total'] = $harga_total;

    	$status =\DB::table('transaksi')->insert($data);

    	if($status){
            return redirect("/kasir/datatransaksi")->with('success', " data berhasil di input");
        }else{
            return redirect('kasir/datatransaksi/create')->with('error', " data gagal di input");
        }
    }

    public function naikkan_statusKasir($id_transaksi){
        try {
            $transaksi = Transaksi::find($id_transaksi);
            $id_status = $transaksi->status_pesanan;
            $urutan_status = $transaksi->status_pesanans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pesanan::where('urutan',$urutan_baru)->first();

            Transaksi::where('id_transaksi',$id_transaksi)->update([
                'status_pesanan'=>$status_baru->id_status_pesanan
            ]);

            \Session::flash('sukses','Status berhasil dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function naikkan_status_pembayaranKasir($id_transaksi){
        try {
            $transaksi = Transaksi::find($id_transaksi);
            $id_status = $transaksi->status_pembayaran;
            $urutan_status = $transaksi->status_pembayarans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pembayaran::where('urutan',$urutan_baru)->first();

            Transaksi::where('id_transaksi',$id_transaksi)->update([
                'status_pembayaran'=>$status_baru->id_status_pembayaran
            ]);

            \Session::flash('sukses','Status berhasil dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function destroyKasir(Request $request, $id_transaksi)
    {
        $result = \DB::table('transaksi')->where('id_transaksi', $id_transaksi)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datatransaksi')->with('error', 'Data Gagal Dihapus');
    }



}