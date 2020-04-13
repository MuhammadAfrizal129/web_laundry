<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PaketController extends Controller{
    public function showData()
    {
        $data['paket'] = \DB::table('paket')->get();
        return view("admin/datapaket",$data);
    }

    public function create()
    {
        return view("admin/ManagePaket");
    }

    public function tambah(Request $request){

        $input = $request->all();

        unset($input['_token']);
        $status =\DB::table('paket')->insert($input);

        if($status){
            return redirect("/admin/datapaket")->with('success', " data berhasil di input");
        }else{
            return redirect('admin/datapaket/create')->with('error', " data gagal di input");
        }
    }

    public function editdata($id)
    {
        $paket = \DB::table('paket')->where('id_paket', $id)->first();
    	return view("admin\ManagePaket", compact('paket'));
    }

    public function updatedata(Request $request, $id)
    {
        $paket = \DB::table('paket')->where('id_paket',$id)->update([
            'id_outlet' => $request->id_outlet,
            'jenis' => $request->jenis,
			'nama_paket' => $request->nama_paket,
			'harga' => $request->harga
		]);
    	return redirect("admin/datapaket");
    }

    public function destroy(Request $request, $id_paket)
    {
        $result = \DB::table('paket')->where('id_paket', $id_paket)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datapaket')->with('error', 'Data Gagal Dihapus');
    }
    
}