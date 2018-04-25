<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'created_by',
    ];

    /**
     * The locations that belong to the image.
     */
    public function locations()
    {
        return $this->belongsToMany('App\Location', 'image_location');
    }
}
