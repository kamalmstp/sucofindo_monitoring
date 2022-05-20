<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Weight;
use App\Models\WeightList;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Options;

class ReportController extends Controller
{
    //
    public function weight()
    {
        //
        $weight = Weight::all();
        return viewAdministrator('report.weight', compact('weight'));
    }

    public function weight_cetak($id)
    {
        $weight = Weight::where('id', $id)->firstOrFail();
        $weightlist = WeightList::where('id_weight', $id)->get();
        
        $data = [
            'weight' => $weight,
            'weightlist' => $weightlist,
            'judul' => "RECAPITULATION OF WEIGHT",
        ];

        PDF::setOptions(['defaultFont' => 'Arial']);
          
        $pdf = PDF::loadView('administrator.report.weight_cetak', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('Recapitulation Of Weight '.$id.'.pdf');
    }
}
