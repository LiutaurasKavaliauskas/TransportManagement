<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclesReportsConnections extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tm_vehicles_reports_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tm_vehicles_id',
        'tm_travel_reports_id'
    ];
}
