<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'description',
        'background_color',
        'type',
        'price',
        'facilitator',
        'created_at',
        'updated_at'
    ];
}
