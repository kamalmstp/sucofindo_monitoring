<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->id;
        $pengiriman = Pengiriman::where('user_id', $id)->get();
        return viewDriver('pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $driver = auth();
        return viewDriver('pengiriman.create', compact('driver'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_barge' => 'required',
            'driver' => 'required',
        ]);

        $driver = $request->get('driver');
        $complete = $request->get('complete');
        $kirim = $request->get('kirim');
        $id_user = $request->get('id_user');

        if($request->hasFile('foto_barge')) {
            $filenameWithExt = $request->file('foto_barge')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_barge')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $foto = $request->file('foto_barge')->storeAs('public/barge', $filenameSimpan);
        }else{
            $filenameSimpan = 'noimage.jpg';
        }

        $pengiriman = [
            'user_id' => $id_user,
            'driver' => $driver,
            'complete_sampel' => $complete,
            'jam_complete' => $request->get('jam_complete'),
            'kirim_sampel' => $kirim,
            'jam_kirim' => $request->get('jam_kirim'),
            'nama_barge' => $request->get('nama_barge'),
            'keterangan' => $request->get('keterangan'),
            'foto_barge' => $filenameSimpan,
        ];

        $createPengiriman = Pengiriman::create($pengiriman);


        if($createPengiriman) {
            $message = setFlashMessage('success', 'insert', 'pengiriman');
        } else {
            $message = setFlashMessage('error', 'insert', 'pengiriman');
        }

        return redirect()->route('driver.pengiriman.index')->with('message', $message);
    }

    public function show(Pengiriman $pengiriman)
    {
        $pengiriman->load(['competencies', 'user', 'study_program']);
        return viewDriver('pengiriman.single', compact('pengiriman'));
    }
}
