<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\UserAttribute;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use Billable;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the attributes record associated with the user.
     */
    public function attributes()
    {

        return $this->hasOne('App\UserAttribute');
    }
}

