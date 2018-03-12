<?php

namespace App\Repositories\Event;

use App\Repositories\EloquentRepository;
use App\Repositories\Event\EventInterface;

class EventRepository extends EloquentRepository implements EventInterface {

    protected $modelClassName = 'App\Event';

    public function findByPlaceId($placeId)
    {
        return $this->find($placeId, 'place_id');
    }
}