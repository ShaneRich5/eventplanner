<?php

namespace App\Repositories\Event;

use App\Repositories\RepositoryInterface;

interface EventInterface extends RepositoryInterface
{
	public function findByPlaceId($placeId);
}