<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuelRatesRequest;
use App\Models\FuelRates;
use App\Models\Vehicles;
use Illuminate\Http\Request;

class FuelRatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = [];

        foreach (Vehicles::all() as $vehicle)
            if ($vehicle->fuelRates == null)
                $vehicles[] = $vehicle;

        return view('transport.fuel_rates', ['rates' => FuelRates::all(), 'vehicles' => array_pluck($vehicles, 'title', 'id')]);
    }

    /**
     * Create a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FuelRatesRequest $request)
    {
        if (FuelRates::where('tm_vehicles_id', $request->vehicle)->first())
            return redirect()->back()->withErrors('Such vehicle already has rates')->withInput();

        FuelRates::firstOrCreate([
            'idle_rate'      => $request->idle_rate,
            'going_rate'     => $request->going_rate,
            'unloading_rate' => $request->unloading_rate,
            'tm_vehicles_id' => $request->vehicle,
        ]);


        return redirect()->back();
    }

    /**
     * Edit the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FuelRatesRequest $request, $id)
    {
        if (FuelRates::find($id))
            FuelRates::where('id', $id)->update([
                'idle_rate'      => $request->idle_rate,
                'going_rate'     => $request->going_rate,
                'unloading_rate' => $request->unloading_rate,
                'tm_vehicles_id' => $request->vehicle,
            ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (FuelRates::find($id))
            FuelRates::where('id', $id)->delete();

        return redirect()->back();
    }
}
