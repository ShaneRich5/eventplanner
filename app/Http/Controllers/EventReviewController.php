<?php

namespace App\Http\Controllers;

use App\Review;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        return response()->json([
            'reviews' => $event->reviews
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $user = Auth::user();
        $data = $request->only('rating', 'body');

        $review = new Review($data);
        $review->user_id = $user->id;
        $review = $event->reviews()->save($review);

        return response()->json([
            'review' => $review
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, Review $review)
    {
        $data = $request->only('rating', 'body');
        $review->update($data);
        return response()->json([
            'review' => $review
        ]);
    }
}
