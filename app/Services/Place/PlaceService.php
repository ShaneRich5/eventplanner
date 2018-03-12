<?php

namespace App\Services\Place;

use App\Repositories\Place\PlaceRepository;

class PlaceService
{
    protected $placeRepository;

    public function __construct(PlaceRepository $placeRepository)
    {
        $this->placeRepository = $placeRepository;
    }

    public function all()
    {
        return $this->placeRepository->getAllPlaces();
    }

    public function findById($id)
    {
        return $this->repository->getPlaceById($id);
    }
}