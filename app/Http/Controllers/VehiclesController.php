<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehiclesRequest;
use App\Models\Vehicles;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transport.vehicles', ['vehicles' => Vehicles::all()->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(VehiclesRequest $request)
    {
        Vehicles::firstOrCreate([
            'title' => $request->title
        ]);

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(VehiclesRequest $request, $id)
    {
        if(Vehicles::find($id))
            Vehicles::where('id', $id)->update(['title' => $request->title]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Vehicles::find($id))
            Vehicles::where('id', $id)->delete();

        return redirect()->back();
    }
}
