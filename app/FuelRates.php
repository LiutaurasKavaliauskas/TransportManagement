<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelRates extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tm_fuel_rates';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idle_rate',
        'going_rate',
        'unloading_rate',
    ];
}
