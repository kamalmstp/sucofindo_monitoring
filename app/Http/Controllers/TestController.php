<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightList;
use PDF;

class TestController extends Controller
{
    //
    public function cetak()
    {
        $weight = WeightList::all();

        $data = [
            'judul' => "TEST",
            'data' => $weight,
        ];

        PDF::setOptions(['defaultFont' => 'Arial']);
          
        $pdf = PDF::loadView('administrator.test.cetak', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('Test.pdf');
    }
}
