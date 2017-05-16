<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTravelReportsConnections extends Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = 'users_travel_reports_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tm_travel_reports_id'
    ];
}
