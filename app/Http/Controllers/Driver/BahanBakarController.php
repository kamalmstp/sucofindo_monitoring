<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Models\BahanBakar;
use Illuminate\Http\Request;

class BahanBakarController extends Controller
{
    //
    public function index()
    {
        $id = auth()->user()->id;
        $bahanbakar = BahanBakar::where('user_id', $id)->get();
        return viewDriver('bahanbakar.index', compact('bahanbakar'));
    }

    public function create()
    {
        $driver = auth();
        return viewDriver('bahanbakar.create', compact('driver'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nominal' => 'required',
            'foto_nota' => 'required',
        ]);

        $driver = $request->get('driver');
        $nominal = $request->get('nominal');
        $id_user = $request->get('id_user');

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
            'user_id' => $id_user,
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

        return redirect()->route('driver.bahanbakar.index')->with('message', $message);
    }
}
