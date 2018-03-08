<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAttribute extends Model
{

    protected $fillable = [
        'user_id',
        'profile_image',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'preferred_contact_method'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
