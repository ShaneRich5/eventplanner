<?php

namespace App\Repositories\Review;

use App\Review;
use App\Repositories\EloquentRepository;
use App\Repositories\Review\ReviewInterface;

class ReviewRepository extends EloquentRepository implements ReviewInterface {

    protected $modelClassName = 'App\Review';

    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function findByPlaceId($placeId)
    {
        return $this->queryByParent($placeId, 'App\Place');
    }

    public function findByEventId($eventId)
    {
        return $this->queryByParent($eventId, 'App\Event');
    }

    public function queryByParent($id, $type)
    {
        return $this->review->where('reviewable_id', '=', $id)->where('reviewable_type', '=', $type)->get();
    }
}