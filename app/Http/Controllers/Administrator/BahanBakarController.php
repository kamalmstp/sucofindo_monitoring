<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\BahanBakar;
use App\Models\User;
use Illuminate\Http\Request;

class BahanBakarController extends Controller
{
    //
    public function index()
    {
        $bahanbakar = BahanBakar::all();
        return viewAdministrator('bahanbakar.index', compact('bahanbakar'));
    }

    public function create()
    {
        $driver = User::all();
        return viewAdministrator('bahanbakar.create', compact('driver'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'foto_nota' => 'required',
        ]);

        $driver = $request->get('driver');
        $nominal = $request->get('nominal');

        if($request->hasFile('foto_nota')) {
            $filenameWithExt = $request->file('foto_nota')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto_nota')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $foto = $request->file('foto_nota')->storeAs('public/nota', $filenameSimpan);
        }else{
            $filenameSimpan = 'noimage.jpg';
        }

        $bbm = [
            'driver' => $driver,
            'nominal' => $nominal,
            'keterangan' => $request->get('keterangan'),
            'foto_nota' => $filenameSimpan,
        ];

        $createBahanBakar = BahanBakar::create($bbm);


        if($createBahanBakar) {
            $message = setFlashMessage('success', 'insert', 'BBM');
        } else {
            $message = setFlashMessage('error', 'insert', 'BBM');
        }

        return redirect()->route('bahanbakar.index')->with('message', $message);
    }

    public function edit($id)
    {
        $bahanbakar = BahanBakar::where('id', $id)->firstOrFail();
        $driver = User::all();
        return viewAdministrator('bahanbakar.edit', compact('bahanbakar', 'driver'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nominal' => 'required',
        ]);

        $driver = $request->get('driver');
        $nominal = $request->get('nominal');

        $bbm = [
            'driver' => $driver,
            'nominal' => $nominal,
            'keterangan' => $request->get('keterangan'),
        ];

        $bahanbakar = BahanBakar::where('id', $id)->update($bbm);

        if($bahanbakar) {
            $message = setFlashMessage('success', 'update', 'BBM');
        } else {
            $message = setFlashMessage('error', 'update', 'BBM');
        }

        return redirect()->route('bahanbakar.index')->with('message', $message);
    }

    public function destroy($id)
    {
        $bahanbakar = BahanBakar::where('id', $id)->firstOrFail();

        if($bahanbakar->delete()) {
            $message = setFlashMessage('success', 'delete', 'bbm');
        } else {
            $message = setFlashMessage('error', 'delete', 'bbm');
        }

        return redirect()->route('bahanbakar.index')->with('message', $message);
    }
}
