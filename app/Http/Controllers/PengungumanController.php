<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengunguman;

class PengungumanController extends Controller
{
    public function view( $kmt_id, $id){
        $pengunguman = Pengunguman::find($id);
        return response()->json($pengunguman);
    }

    public function edit(Request $request, $kmt_id){

        $validateData = $request->validate([
            'nama' => 'required',
            'konten' => 'required',
            'tgl_tampil' => 'required',
            'tgl_selesai' => 'required|after:tgl_tampil',
        ]);

        
        $pengunguman = Pengunguman::find(request('id_pen'));
        $pengunguman->nama = request('nama');
        $pengunguman->konten = request('konten');
        $pengunguman->tgl_tampil = request('tgl_tampil');
        $pengunguman->tgl_selesai = request('tgl_selesai');
        $pengunguman->save();

        return redirect()->back()->with('success','Pengunguman berhasil diupdate!');
    }

    public function create(Request $request, $kmt_id){
        $validateData = $request->validate([
            'nama' => 'required',
            'konten' => 'required',
            'tgl_tampil' => 'required',
            'tgl_selesai' => 'required|after:tgl_tampil',
        ]);

        $pengunguman = new Pengunguman();
        $pengunguman->nama = $request->input('nama');
        $pengunguman->konten = $request->input('konten');
        $pengunguman->tgl_tampil = $request->input('tgl_tampil');
        $pengunguman->tgl_selesai = $request->input('tgl_selesai');
        $pengunguman->komunitas_id = $kmt_id;
        $pengunguman->save();

        return redirect()->back()->with('success','pengunguman berhasil dibuat!');
    }

    public function delete(Request $request, $kmt_id){
        $pengunguman = Pengunguman::find(request('id'))->delete();
        return redirect()->back()->with('success','pengunguman berhasil dihapus!');
    }
}
