<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Weight;
use App\Models\WeightList;
use Illuminate\Http\Request;
use PDF;

class WeightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $weight = Weight::all();
        return viewAdministrator('weight.index', compact('weight'));
    }

    public function list($id)
    {
        $weight = Weight::where('id', $id)->firstOrFail();
        $weightlist = WeightList::where('id_weight', $id)->get();
        return viewAdministrator('weight.list.index', compact('weight','weightlist'));
    }

    public function list_del($id)
    {
        $list = WeightList::where('id', $id)->firstOrFail();

        if($list->delete()) {
            $message = setFlashMessage('success', 'delete', 'list');
        } else {
            $message = setFlashMessage('error', 'delete', 'list');
        }

        return redirect()->back()->with('message', $message);
    }

    public function list_save(Request $request)
    {
        $this->validate($request, [
            'no_reg' => 'required',
            'gross' => 'required',
            'tare' => 'required',
            'net' => 'required'
        ]);

        $list = new WeightList();
        $list->id_weight = $request->get('id_weight');
        $list->no_reg = $request->get('no_reg');
        $list->gross = $request->get('gross');
        $list->tare = $request->get('tare');
        $list->net = $request->get('net');

        if($list->save()) {
            $message = setFlashMessage('success', 'insert', 'weight list');
        } else {
            $message = setFlashMessage('error', 'insert', 'weight list');
        }

        return redirect()->back()->with('message', $message);
    }

    public function list_update(Request $request, $id)
    {
        $this->validate($request, [
            'no_reg' => 'required',
            'gross' => 'required',
            'tare' => 'required',
            'net' => 'required'
        ]);

        $list = WeightList::where('id', $id)->firstOrFail();
        $list->no_reg = $request->get('no_reg');
        $list->gross = $request->get('gross');
        $list->tare = $request->get('tare');
        $list->net = $request->get('net');

        if($list->update()) {
            $message = setFlashMessage('success', 'update', 'Weight List');
        } else {
            $message = setFlashMessage('error', 'update', 'Weight List');
        }

        return redirect()->back()->with('message', $message);
    }

    public function cetak($id)
    {
        $weight = Weight::where('id', $id)->firstOrFail();
        $weightlist = WeightList::where('id_weight', $id)->get();

        $class = 'text-left';
        $pdf = PDF::loadView('layouts.cetak', compact('weight', 'weightlist'));
        return $pdf->setPaper('a4', 'potrait')->stream('CPO-Weight-List-'.$weight->id.'.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return viewAdministrator('weight.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'vess' => 'required',
            'comm' => 'required',
            'quan' => 'required',
            'ship' => 'required',
            'buyer' => 'required',
            'place' => 'required',
            'date' => 'required',
            'time' => 'required',
            'until' => 'required',
            'shore' => 'required',
        ]);

        $weight = [
            'vess' => $request->get('vess'),
            'comm' => $request->get('comm'),
            'quan' => $request->get('quan'),
            'ship' => $request->get('ship'),
            'buyer' => $request->get('buyer'),
            'place' => $request->get('place'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'until' => $request->get('until'),
            'shore' => $request->get('shore'),
            'rep' => $request->get('rep'),
            'insp' => $request->get('insp'),
        ];

        $createWeight = Weight::create($weight);

        if($createWeight) {
            $message = setFlashMessage('success', 'insert', 'weight');
        } else {
            $message = setFlashMessage('error', 'insert', 'weight');
        }

        return redirect()->route('weight.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $weight = Weight::where('id', $id)->firstOrFail();
        return viewAdministrator('weight.edit', compact('weight'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'vess' => 'required',
            'comm' => 'required',
            'quan' => 'required',
            'ship' => 'required',
            'buyer' => 'required',
            'place' => 'required',
            'date' => 'required',
            'time' => 'required',
            'until' => 'required',
            'shore' => 'required',
        ]);

        $weight = [
            'vess' => $request->get('vess'),
            'comm' => $request->get('comm'),
            'quan' => $request->get('quan'),
            'ship' => $request->get('ship'),
            'buyer' => $request->get('buyer'),
            'place' => $request->get('place'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'until' => $request->get('until'),
            'shore' => $request->get('shore'),
            'rep' => $request->get('rep'),
            'insp' => $request->get('insp'),
        ];

        $updateWeight = Weight::where('id', $id)->update($weight);

        if($updateWeight) {
            $message = setFlashMessage('success', 'update', 'weight');
        } else {
            $message = setFlashMessage('error', 'update', 'weight');
        }

        return redirect()->route('weight.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $weight = Weight::where('id', $id)->firstOrFail();

        if($weight->delete()) {
            $message = setFlashMessage('success', 'delete', 'weight');
        } else {
            $message = setFlashMessage('error', 'delete', 'weight');
        }

        return redirect()->back()->with('message', $message);
    }
}
