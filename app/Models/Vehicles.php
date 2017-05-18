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

    /**
     * Return the connected fuel rates
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fuelRates()
    {
        return $this->belongsTo('App\Models\Fuelrates',  'id', 'tm_vehicles_id');
    }
}
