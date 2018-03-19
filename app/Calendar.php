<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = [
        'event_id',
        'title',
        'description',
        'start',
        'end',
        'all_day',
        'background_color',
        'facilitator',
        'location',
        'price',
        'created_by'
    ];

}
