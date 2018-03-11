<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillabe = ['name', 'description'];

    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }
}
