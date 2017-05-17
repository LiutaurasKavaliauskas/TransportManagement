<?php

namespace App;

use App\Models\Roles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'roles_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Checks if user has admin role
     */
    public function isAdmin()
    {
        if(Roles::where('id', $this->roles_id)->first()->name == 'Admin')
            return true;
        else
            return false;
    }

    /**
     * Checks if users has user role
     */
    public function isUser()
    {
        if(Roles::where('id', $this->roles_id)->first()->name == 'User')
            return true;
        else
            return false;
    }

}
