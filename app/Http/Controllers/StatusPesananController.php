<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StatusPesananController extends Controller{
    public function showData()
    {
        $data['status_pesanan'] = \DB::table('status_pesanan')->get();
        return view("admin/datastatuspesan",$data);
    }

    public function create()
    {
        return view("admin/ManageStatusPesan");
    }

    public function tambah(Request $request){

        $input = $request->all();

        unset($input['_token']);
        $status =\DB::table('status_pesanan')->insert($input);

        if($status){
            return redirect("/admin/datastatuspesan")->with('success', " data berhasil di input");
        }else{
            return redirect('admin/datastatuspesan/create')->with('error', " data gagal di input");
        }
    }

    public function editdata($id)
    {
        $paket = \DB::table('status_pesanan')->where('id_status_pesanan', $id)->first();
    	return view("admin\ManageStatusPesan", compact('status_pesanan'));
    }

    public function updatedata(Request $request, $id)
    {
        $paket = \DB::table('status_pesanan')->where('id_status_pesanan',$id)->update([
            'id_status_pesanan' => $request->id_status_pesanan,
            'nama_status_pesanan' => $request->nama_status_pesanan,
			'urutan' => $request->urutan
		]);
    	return redirect("admin/datastatuspesan");
    }

    public function destroy(Request $request, $id_status_pesanan)
    {
        $result = \DB::table('status_pesanan')->where('id_status_pesanan', $id_status_pesanan)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datastatuspesan')->with('error', 'Data Gagal Dihapus');
    }
    
}