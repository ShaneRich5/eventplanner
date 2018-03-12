<?php

namespace App\Repositories\Event;

use App\Event;
use App\Repositories\EloquentRepository;
use App\Repositories\Event\EventInterface;

class EventRepository extends EloquentRepository implements EventInterface {

    protected $modelClassName = 'App\Event';
    protected $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    public function findByPlaceId($placeId)
    {
        return $this->event->where('place_id', $placeId)->get();
    }
}