<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class OutletController extends Controller{
    public function showData()
    {
        $data['outlet'] = \DB::table('outlet')->get();
        return view("admin/dataoutlet",$data);
    }

    public function create()
    {
        return view("admin/ManageOutlet");
    }

    public function tambah(Request $request){

        $input = $request->all();

        unset($input['_token']);
        $status =\DB::table('outlet')->insert($input);

        if($status){
            return redirect("/admin/dataoutlet")->with('success', " data berhasil di input");
        }else{
            return redirect('admin/dataoutlet/create')->with('error', " data gagal di input");
        }
    }

    public function editdata($id)
    {
        $outlet = \DB::table('outlet')->where('id_outlet', $id)->first();
    	return view("admin\ManageOutlet", compact('outlet'));
    }

    public function updatedata(Request $request, $id)
    {
        $outlet = \DB::table('outlet')->where('id_outlet',$id)->update([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'no_tlp' => $request->no_tlp
		]);
    	return redirect("admin/dataoutlet");
    }

    public function destroy(Request $request, $id_outlet)
    {
        $result = \DB::table('outlet')->where('id_outlet', $id_outlet)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('dataoutlet')->with('error', 'Data Gagal Dihapus');
    }
    
}