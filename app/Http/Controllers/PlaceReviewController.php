<?php

namespace App\Http\Controllers;

use App\Repositories\Review\ReviewRepository as Review;
use App\Repositories\Place\PlaceRepository as Place;
use App\Repositories\User\UserRepository as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceReviewController extends Controller
{
    protected $place;
    protected $review;
    protected $user;

    public function __construct(Place $place, Review $review, User $user)
    {
        $this->place = $place;
        $this->review = $review;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $reviews = $this->review->findByPlaceId($id);
        return response()->json(['reviews' => $reviews]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $placeId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $placeId)
    {
        $user = Auth::user();
        $data = collect($request->only('rating', 'body'))
                    ->merge(['user_id' => $user->id])
                    ->merge(['place_id' => $placeId])
                    ->toArray();

        $review = $this->review->create($data);
        $review['user'] = $this->user->find($review['id']);

        return response()->json(['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $placeId
     * @param  integer  $reviewId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $placeId, $reviewId)
    {
        $data = $request->only('rating', 'body');
        $this->review->update($data, $reviewId);
        $review = $this->review->find($reviewId);
        $review['user'] = $this->user->find($review['user_id']);
        return response()->json(['review' => $review]);
    }
}
