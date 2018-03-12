<?php

namespace App\Http\Controllers;

use App\Repositories\Review\ReviewRepository as Review;
use App\Repositories\Event\EventRepository as Event;
use App\Repositories\User\UserRepository as User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventReviewController extends Controller
{
    protected $event;
    protected $review;
    protected $user;

    public function __construct(Event $event, Review $review, User $user)
    {
        $this->event = $event;
        $this->review = $review;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  integer  $eventId
     * @return \Illuminate\Http\Response
     */
    public function index($eventId)
    {
        $reviews = $this->review->findByEventId($eventId);
        return response()->json(compact('reviews'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $eventId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $eventId)
    {
        $user = Auth::user();
        $data = collect($request->only('rating', 'body'))
                    ->merge(['user_id' => $user->id])
                    ->merge(['reviewable_id' => $eventId])
                    ->merge(['reviewable_type' => 'App\Event'])
                    ->toArray();

        $review = $this->review()->create($data);
        $review['user'] = $this->user->find($review['id']);

        return response()->json(['review' => $review]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $eventId
     * @param  integer  $reviewId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eventId, $reviewId)
    {
        $data = $request->only('rating', 'body');
        $this->review->update($data, $reviewId);
        $review = $this->review->find($reviewId);
        $review['user'] = $this->user->find($review['user_id']);
        return response()->json(['review' => $review]);
    }
}
