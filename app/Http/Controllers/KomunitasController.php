<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komunitas;
use App\User;
use Illuminate\Support\Facades\Auth;

class KomunitasController extends Controller
{
    public function index($kmt_id){
        $komunitas = Komunitas::find($kmt_id);
        $user_komunitas = $komunitas->users;
        if ($komunitas->modul->count() > 0)
            $modul_komunitas = $komunitas->modul;
        else
            $modul_komunitas = null;
        if ($komunitas->pengumuman->count() > 0)
            $pengumuman_komunitas = $komunitas->pengumuman;
        else
            $pengumuman_komunitas = null;
        return view('admin.index',compact(['komunitas','user_komunitas','modul_komunitas','pengumuman_komunitas']));
    }

    public function requestUser($kmt_id){
        $komunitas = Auth::user()->komunitas->find($kmt_id);
        if ($komunitas) {
            return redirect()->back()->with('error','Nama sudah terdaftar pada komunitas, silahkan hubungi admin');
        }
        Auth::user()->komunitas()->attach(Komunitas::find($kmt_id));

        return redirect()->back()->with('success','request berhasil dibuat, silahkan menunggu konfirmasi admin');
    }

    public function acceptUser(Request $request,$kmt_id){
        $komunitas = Komunitas::find($kmt_id);
        $komunitas->users()->updateExistingPivot(request('id'), ['status' => 1], false);
        $komunitas->save();
        
        return redirect()->back()->with('success','user berhasil diterima');
    }

    public function removeUser(Request $request,$kmt_id){
        $user = User::find(request('id'));
        if($user->komunitas->find($kmt_id)->pivot->status > 1)
            return redirect()->back()->with('error','admin tidak dapat dikeluarkan dari komunitas');
        $komunitas = Komunitas::find($kmt_id);
        $komunitas->users()->detach(request('id'));

        return redirect()->back()->with('success','user berhasil dikeluarkan dari komunitas');
    }
}
