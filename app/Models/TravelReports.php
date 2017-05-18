<?php

namespace App\Models;

use App\User;
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

    /**
     * Return the connected vehicles
     *
     * @return mixed
     */
    public function getVehicle()
    {
        return $this->belongsToMany(Vehicles::class, (new VehiclesReportsConnections())->getTable(), 'tm_travel_reports_id', 'tm_vehicles_id')->select('title');
    }

    /**
     * Return the connected user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUser()
    {
        return $this->belongsToMany(User::class, (new UsersTravelReportsConnections())->getTable(), 'tm_travel_reports_id', 'user_id');

    }
}
