<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;

class PengumumanController extends Controller
{
    public function view( $kmt_id, $id){
        $pengumuman= Pengumuman::find($id);
        return response()->json($pengumuman);
    }

    public function edit(Request $request, $kmt_id){

        $validateData = $request->validate([
            'nama' => 'required',
            'konten' => 'required',
            'tgl_tampil' => 'required',
            'tgl_selesai' => 'required|after:tgl_tampil',
        ]);

        
        $pengumuman= Pengumuman::find(request('id_pen'));
        $pengumuman->nama = request('nama');
        $pengumuman->konten = request('konten');
        $pengumuman->tgl_tampil = request('tgl_tampil');
        $pengumuman->tgl_selesai = request('tgl_selesai');
        $pengumuman->save();

        return redirect()->back()->with('success','Pengumuman berhasil diupdate!');
    }

    public function create(Request $request, $kmt_id){
        $validateData = $request->validate([
            'nama' => 'required',
            'konten' => 'required',
            'tgl_tampil' => 'required',
            'tgl_selesai' => 'required|after:tgl_tampil',
        ]);

        $pengumuman= new Pengumuman();
        $pengumuman->nama = $request->input('nama');
        $pengumuman->konten = $request->input('konten');
        $pengumuman->tgl_tampil = $request->input('tgl_tampil');
        $pengumuman->tgl_selesai = $request->input('tgl_selesai');
        $pengumuman->komunitas_id = $kmt_id;
        $pengumuman->save();

        return redirect()->back()->with('success','Pengumuman berhasil dibuat!');
    }

    public function delete(Request $request, $kmt_id){
        $pengumuman= Pengumuman::find(request('id'))->delete();
        return redirect()->back()->with('success','Pengumuman berhasil dihapus!');
    }
}
