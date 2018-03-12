<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function reviews()
    {
        return $this->morphMany('App\Review', 'reviewable');
    }
}
