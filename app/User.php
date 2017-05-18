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
     * Check if user's role is admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        if(Roles::where('id', $this->roles_id)->first()->name == 'Admin')
            return true;
        else
            return false;
    }

    /**
     * Check if user's role is user
     *
     * @return bool
     */
    public function isUser()
    {
        if(Roles::where('id', $this->roles_id)->first()->name == 'User')
            return true;
        else
            return false;
    }

    /**
     * Get role of user
     *
     * @return mixed
     */
    public function getRole()
    {
        return Roles::where('id', $this->roles_id)->first()->name;
    }

}
