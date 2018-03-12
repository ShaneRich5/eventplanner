<?php

namespace App\Respositories\EventRepository;

use App\Respositories\EloquentRepository;
use App\Respositories\Event\EventInterface;

class EventRepository extends EloquentRepository implements EventInterface {

    protected $modelClassName = 'Event';

}