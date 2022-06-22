<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Briefing;
use App\Models\Briefing_detail;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Options;

class BriefingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Briefing::all();
        return viewAdministrator('briefing.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $karyawan = Karyawan::all();
        return viewAdministrator('briefing.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Briefing::create($request->all());

        if($create) {
            $message = setFlashMessage('success', 'insert', 'briefing');
        } else {
            $message = setFlashMessage('error', 'insert', 'briefing');
        }

        return redirect()->route('briefing.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::all();
        $brief = Briefing::join('m_karyawan', 'briefing.pemberi_briefing', '=', 'm_karyawan.id')->where('briefing.id', $id)->firstOrFail();
        $id_brief = $id;
        $detail = Briefing_detail::join('m_karyawan', 'briefing_detail.id_karyawan', '=', 'm_karyawan.id')->where('id_briefing', $id)
                    ->select('briefing_detail.id as detail', 'm_karyawan.*')->get();
        // dd($detail);
        return viewAdministrator('briefing.show', compact('brief', 'karyawan', 'id_brief', 'detail'));
    }

    public function store_pegawai(Request $request)
    {

        $create = Briefing_detail::create($request->all());

        if($create) {
            $message = setFlashMessage('success', 'insert', 'briefing');
        } else {
            $message = setFlashMessage('error', 'insert', 'briefing');
        }

        return redirect()->back()->with('message', $message);
    }

    public function del_pegawai($id)
    {
        //
        $pegawai = Briefing_detail::where('id', $id)->firstOrFail();

        if($pegawai->delete()) {
            $message = setFlashMessage('success', 'delete', 'pegawai');
        } else {
            $message = setFlashMessage('error', 'delete', 'pegawai');
        }

        return redirect()->back()->with('message', $message);
    }

    public function cetak($id)
    {
        $brief = Briefing::join('m_karyawan', 'briefing.pemberi_briefing', '=', 'm_karyawan.id')->where('briefing.id', $id)->firstOrFail();
        $detail = Briefing_detail::join('m_karyawan', 'briefing_detail.id_karyawan', '=', 'm_karyawan.id')->where('id_briefing', $id)
                    ->get();
        
        $data = [
            'brief' => $brief,
            'detail' => $detail,
            'judul' => "BRIEFING PROSEDUR DAN K3",
        ];

        PDF::setOptions(['defaultFont' => 'Arial']);
          
        $pdf = PDF::loadView('administrator.briefing.cetak', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('Briefing-Prosedur-Dan-K3-'.$id.'.pdf');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $briefing = Briefing::where('id', $id)->firstOrFail();
        return viewAdministrator('briefing.edit', compact('briefing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Briefing $briefing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Briefing  $briefing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $briefing = Briefing::where('id', $id)->firstOrFail();

        if($briefing->delete()) {
            $message = setFlashMessage('success', 'delete', 'briefing');
        } else {
            $message = setFlashMessage('error', 'delete', 'briefing');
        }

        return redirect()->back()->with('message', $message);
    }
}
