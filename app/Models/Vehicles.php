<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tm_vehicles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
    ];

    public function fuelRates()
    {
        return $this->belongsTo('App\Models\Fuelrates',  'id', 'tm_vehicles_id');
    }
//
//    public function filterVehicles()
//    {
//        $vehicles = [];
//        foreach (Vehicles::all() as $vehicle)
//            foreach (FuelRates::all() as $rate)
//                if($vehicle['id'] != $rate->vehicle['id'])
//                    $vehicles = $vehicle;
//
//        dd($vehicles);
//        return $vehicles;
//
//    }
}
