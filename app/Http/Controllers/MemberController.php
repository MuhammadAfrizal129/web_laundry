<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MemberController extends Controller{
    public function showData()
    {
        $data['member'] = \DB::table('member')->get();
        return view("admin/datamember",$data);
    }

    public function create()
    {
        return view("admin/ManageMember");
    }

    public function tambah(Request $request){

        $input = $request->all();

        unset($input['_token']);
        $status =\DB::table('member')->insert($input);

        if($status){
            return redirect("/admin/datamember")->with('success', " data berhasil di input");
        }else{
            return redirect('admin/datamember/create')->with('error', " data gagal di input");
        }
    }

    public function editdata($id)
    {
        $member = \DB::table('member')->where('id_member', $id)->first();
    	return view("admin\ManageMember", compact('member'));
    }

    public function updatedata(Request $request, $id)
    {
        $member = \DB::table('member')->where('id_member',$id)->update([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'jenkel' => $request->jenkel,
			'no_tlp' => $request->no_tlp
		]);
    	return redirect("admin/datamember");
    }

    public function destroy(Request $request, $id_member)
    {
        $result = \DB::table('member')->where('id_member', $id_member)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datamember')->with('error', 'Data Gagal Dihapus');
    }

//kasir

    public function showDataKasir()
    {
        $data['member'] = \DB::table('member')->get();
        return view("kasir/datamember",$data);
    }

    public function createKasir()
    {
        return view("kasir/ManageMember");
    }

    public function tambahKasir(Request $request){

        $input = $request->all();

        unset($input['_token']);
        $status =\DB::table('member')->insert($input);

        if($status){
            return redirect("/kasir/datamember")->with('success', " data berhasil di input");
        }else{
            return redirect('kasir/datamember/create')->with('error', " data gagal di input");
        }
    }

    public function editdataKasir($id)
    {
        $member = \DB::table('member')->where('id_member', $id)->first();
    	return view("kasir\ManageMember", compact('member'));
    }

    public function updatedataKasir(Request $request, $id)
    {
        $member = \DB::table('member')->where('id_member',$id)->update([
			'nama' => $request->nama,
			'alamat' => $request->alamat,
			'jenkel' => $request->jenkel,
			'no_tlp' => $request->no_tlp
		]);
    	return redirect("kasir/datamember");
    }

    public function destroyKasir(Request $request, $id_member)
    {
        $result = \DB::table('member')->where('id_member', $id_member)->delete();

        if($result) return redirect()->back()->with('success', 'Data Berhasil Dihapus');
        else return view('datamember')->with('error', 'Data Gagal Dihapus');
    }
    
}