<?php

namespace App\Http\Controllers;

use App\Review;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        return response()->json([
            'reviews' => $place->reviews
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function create(Place $place)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Place $place)
    {
        $user = Auth::user();
        $data = $request->only('rating', 'body');

        $review = new Review($data);
        $review->user_id = $user->id;
        $review = $place->reviews()->save($review);

        return response()->json([
            'review' => $review
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place, Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place, Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place, Review $review)
    {
        $data = $request->only('rating', 'body');
        $review->update($data);
        return response()->json([
            'review' => $review
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place, Review $review)
    {
        //
    }
}
