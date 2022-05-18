<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Barges;
use App\Models\BargesList;
use Illuminate\Http\Request;

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
