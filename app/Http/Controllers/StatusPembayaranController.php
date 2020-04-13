<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class StatusPembayaranController extends Controller{
    public function showData()
    {
        $data['status_pembayaran'] = \DB::table('status_pembayaran')->get();
        return view("admin/datastatusbayar",$data);
    }

    public function create()
    {
        return view("admin/ManageStatusBayar");
    }

    public function tambah(Request $request){

        $input = $request->all();
        

        unset($input['_token']);
        $status =\DB::table('status_pembayaran')->insert($input);

        if($status){
            return redirect("/admin/datastatusbayar")->with('success', " data berhasil di input");
        }else{
            return redirect('admin/datastatusbayar/create')->with('error', " data gagal di input");
        }
    }

    public function editdata($id)
    {
        $paket = \DB::table('status_pembayaran')->where('id_status_pembayaran', $id)->first();
    	return view("admin\ManageStatusBayar", compact('status_pembayaran'));
    }

    public function updatedata(Request $request, $id)
    {
        $paket = \DB::table('status_pembayaran')->where('id_status_pembayaran',$id)->update([
            'id_status_pembayaran' => $request->id_status_pembayaran,
            'nama_status_pembayaran' => $request->nama_status_pembayaran,
			'urutan' => $request->urutan
		]);
    	return redirect("admin/datastatusbayar");
    }

    public function destroy(Request $request, $id_status_pembayaran)
    {
        $result = \DB::table('status_pembayaran')->where('id_status_pembayaran', $id_status_pembayaran)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datastatusbayar')->with('error', 'Data Gagal Dihapus');
    }
    
}