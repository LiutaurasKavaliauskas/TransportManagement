<?php

namespace App;

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
        'tm_fuel_rates_id',
    ];
}
