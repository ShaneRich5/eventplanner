<?php

namespace App\Repositories\Place;

use App\Repositories\EloquentRepository;
use App\Repositories\Place\PlaceInterface;

class PlaceRepository extends EloquentRepository implements PlaceInterface {

    protected $modelClassName = 'App\Place';

}