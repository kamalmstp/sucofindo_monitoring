<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengirimanController extends Controller
{
    //
    public function index()
    {
        $pengiriman = Pengiriman::all();
        return viewAdministrator('pengiriman.index', compact('pengiriman'));
    }

    public function create()
    {
        $driver = User::all();
        return viewAdministrator('pengiriman.create', compact('driver'));
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

        return redirect()->route('pengiriman.index')->with('message', $message);
    }

    public function show(Lecturer $lecturer)
    {
        $lecturer->load(['competencies', 'user', 'study_program']);
        return viewAdministrator('lecturer.single', compact('lecturer'));
    }

    public function edit($id)
    {
        $pengiriman = Pengiriman::where('id', $id)->firstOrFail();
        $driver = User::all();
        return viewAdministrator('pengiriman.edit', compact('pengiriman', 'driver'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_barge' => 'required',
            'driver' => 'required',
        ]);

        $driver = $request->get('driver');
        $complete = $request->get('complete');
        $kirim = $request->get('kirim');

        $pengiriman = [
            'driver' => $driver,
            'complete_sampel' => $complete,
            'jam_complete' => $request->get('jam_complete'),
            'kirim_sampel' => $kirim,
            'jam_kirim' => $request->get('jam_kirim'),
            'nama_barge' => $request->get('nama_barge'),
            'keterangan' => $request->get('keterangan'),
        ];

        $updatePengiriman = Pengiriman::where('id', $id)->update($pengiriman);

        if($updatePengiriman) {
            $message = setFlashMessage('success', 'update', 'pengiriman');
        } else {
            $message = setFlashMessage('error', 'update', 'pengiriman');
        }

        return redirect()->route('pengiriman.index')->with('message', $message);
    }

    public function destroy($id)
    {
        $pengiriman = Pengiriman::where('id', $id)->firstOrFail();

        if($pengiriman->delete()) {
            $message = setFlashMessage('success', 'delete', 'pengiriman');
        } else {
            $message = setFlashMessage('error', 'delete', 'pengiriman');
        }

        return redirect()->route('pengiriman.index')->with('message', $message);
    }
}
