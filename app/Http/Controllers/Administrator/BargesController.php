<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Barges;
use App\Models\BargesList;
use Illuminate\Http\Request;
use PDF;

class BargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barges = Barges::all();
        return viewAdministrator('barges.index', compact('barges'));
    }

    public function list($id)
    {
        $barges = Barges::where('id', $id)->firstOrFail();
        $bargeslist = BargesList::where('id_barges', $id)->get();
        return viewAdministrator('barges.list.index', compact('barges','bargeslist'));
    }

    public function list_del($id)
    {
        $list = BargesList::where('id', $id)->firstOrFail();

        if($list->delete()) {
            $message = setFlashMessage('success', 'delete', 'list');
        } else {
            $message = setFlashMessage('error', 'delete', 'list');
        }

        return redirect()->back()->with('message', $message);
    }

    public function list_create($id)
    {
        $barges = Barges::where('id', $id)->firstOrFail();

        return viewAdministrator('barges.list.create', compact('barges'));
    }

    public function list_save(Request $request)
    {
        $this->validate($request, [
            'no_sublot' => 'required',
            'incr_no' => 'required',
            'date' => 'required',
            'time' => 'required',
            'trucks_number' => 'required',
            'gatm' => 'required',
            'size' => 'required',
            'seal_number' => 'required',
            'remark' => 'required'
        ]);

        $list = new BargesList();
        $list->id_barges = $request->get('id_barges');
        $list->no_sublot = $request->get('no_sublot');
        $list->incr_no = $request->get('incr_no');
        $list->date = $request->get('date');
        $list->time = $request->get('time');
        $list->trucks_number = $request->get('trucks_number');
        $list->gatm = $request->get('gatm');
        $list->size = $request->get('size');
        $list->seal_number = $request->get('seal_number');
        $list->remark = $request->get('remark');

        if($list->save()) {
            $message = setFlashMessage('success', 'insert', 'barges list');
        } else {
            $message = setFlashMessage('error', 'insert', 'barges list');
        }

        return redirect()->back()->with('message', $message);
    }

    public function list_update(Request $request, $id)
    {
        $this->validate($request, [
            'no_sublot' => 'required',
            'incr_no' => 'required',
            'date' => 'required',
            'time' => 'required',
            'trucks_number' => 'required',
            'gatm' => 'required',
            'size' => 'required',
            'seal_number' => 'required',
            'remark' => 'required'
        ]);

        $list = BargesList::where('id', $id)->firstOrFail();
        $list->id_barges = $request->get('id_barges');
        $list->no_sublot = $request->get('no_sublot');
        $list->incr_no = $request->get('incr_no');
        $list->date = $request->get('date');
        $list->time = $request->get('time');
        $list->trucks_number = $request->get('trucks_number');
        $list->gatm = $request->get('gatm');
        $list->size = $request->get('size');
        $list->seal_number = $request->get('seal_number');
        $list->remark = $request->get('remark');

        if($list->update()) {
            $message = setFlashMessage('success', 'update', 'Barges List');
        } else {
            $message = setFlashMessage('error', 'update', 'Barges List');
        }

        return redirect()->back()->with('message', $message);
    }

    public function cetak($id)
    {
        $barges = Barges::where('id', $id)->firstOrFail();
        $bargeslist = BargesList::where('id_barges', $id)->get();

        $data = [
            'barges' => $barges,
            'bargeslist' => $bargeslist,
            'judul' => "BARGES/TRUCKS INCREMENT RECORD",
        ];

        PDF::setOptions(['defaultFont' => 'Arial']);
          
        $pdf = PDF::loadView('administrator.barges.list.cetak', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('Barges List '.$id.'.pdf');

        // $count = 0;
        // foreach ($weightlist as $item){
        //     if($count == 10){

        //     }else{

        //     }
        //     $count++;
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return viewAdministrator('barges.create');
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
            'vessel' => 'required',
            'date' => 'required',
            'place' => 'required',
            'customer' => 'required',
            'quantity' => 'required',
            'increment_numb' => 'required',
            'type_of_coal' => 'required',
            'sampling_method' => 'required',
        ]);

        $barges = [
            'vessel' => $request->get('vessel'),
            'date' => $request->get('date'),
            'place' => $request->get('place'),
            'customer' => $request->get('customer'),
            'quantity' => $request->get('quantity'),
            'increment_numb' => $request->get('increment_numb'),
            'type_of_coal' => $request->get('type_of_coal'),
            'sampling_method' => $request->get('sampling_method'),
            'reference' => $request->get('reference'),
            'foreman' => $request->get('foreman'),
        ];

        $createBarges = Barges::create($barges);

        if($createBarges) {
            $message = setFlashMessage('success', 'insert', 'barges');
        } else {
            $message = setFlashMessage('error', 'insert', 'barges');
        }

        return redirect()->route('barges.index')->with('message', $message);
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
        $barges = Barges::where('id', $id)->firstOrFail();
        return viewAdministrator('barges.edit', compact('barges'));
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
            'vessel' => 'required',
            'date' => 'required',
            'place' => 'required',
            'customer' => 'required',
            'quantity' => 'required',
            'increment_numb' => 'required',
            'type_of_coal' => 'required',
            'sampling_method' => 'required',
        ]);

        $barges = [
            'vessel' => $request->get('vessel'),
            'date' => $request->get('date'),
            'place' => $request->get('place'),
            'customer' => $request->get('customer'),
            'quantity' => $request->get('quantity'),
            'increment_numb' => $request->get('increment_numb'),
            'type_of_coal' => $request->get('type_of_coal'),
            'sampling_method' => $request->get('sampling_method'),
            'reference' => $request->get('reference'),
            'foreman' => $request->get('foreman'),
        ];

        $createBarges = Barges::where('id', $id)->update($barges);

        if($createBarges) {
            $message = setFlashMessage('success', 'update', 'barges');
        } else {
            $message = setFlashMessage('error', 'update', 'barges');
        }

        return redirect()->route('barges.index')->with('message', $message);
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
        $barges = Barges::where('id', $id)->firstOrFail();

        if($barges->delete()) {
            $message = setFlashMessage('success', 'delete', 'barges');
        } else {
            $message = setFlashMessage('error', 'delete', 'barges');
        }

        return redirect()->back()->with('message', $message);
    }
}
