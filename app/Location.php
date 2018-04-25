<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip',
        'floor',
        'description',
        'contact',
        'email',
        'phone',
        'capacity',
        'active',
    ];

    /**
     * The products that belong to the shop.
     */
    public function images()
    {
        return $this->belongsToMany('App\Image', 'image_location');
    }
}
