<?php

namespace App\Http\Controllers;

use App\Http\Requests\TravelReportsRequest;
use App\Models\TravelReports;
use App\Models\Vehicles;
use App\Models\VehiclesReportsConnections;
use Illuminate\Http\Request;

class TravelReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transport.reports', ['reports' => TravelReports::all(), 'vehicles' => Vehicles::pluck('title', 'id')->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TravelReportsRequest $request)
    {
        $vehicle = Vehicles::where('id', $request->vehicle)->first();

        $timeGoing = ((strtotime($request->arrived_to_client_at) - strtotime($request->left_terminal_at)) +
                (strtotime($request->arrived_to_terminal_at) - strtotime($request->left_client_at))) / 3600;

        $timeStanding = ((strtotime($request->left_client_at) - strtotime($request->arrived_to_client_at)) / 60 - (int)$request->unloading_time) / 60;

        $report = TravelReports::firstOrCreate([
            'date'                   => $request->date,
            'route'                  => $request->route,
            'terminal_left'          => $request->left_terminal_at,
            'terminal_arrived'       => $request->arrived_to_terminal_at,
            'speedometer_readings_1' => $request->speedometer_readings_1,
            'client_arrived'         => $request->arrived_to_client_at,
            'client_left'            => $request->left_client_at,
            'speedometer_readings_2' => $request->speedometer_readings_2,
            'time_unloading'         => $request->unloading_time,
            'distance'               => $request->speedometer_readings_2 - $request->speedometer_readings_1,
            'fuel'                   => $vehicle->fuelRates->idle_rate * $timeStanding + $vehicle->fuelRates->going_rate * $timeGoing + $vehicle->fuelRates->unloading_time * $request->unloading_time,
        ]);

        VehiclesReportsConnections::create([
            'tm_vehicles_id'       => $vehicle->id,
            'tm_travel_reports_id' => $report->id,
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
