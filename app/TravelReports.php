<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelReports extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'tm_travel_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'route',
        'terminal_left',
        'terminal_arrived',
        'speedometer_readings_1',
        'speedometer_readings_2',
        'client_arrived',
        'client_left',
        'time_unloading',
        'distance',
        'fuel',
    ];
}
