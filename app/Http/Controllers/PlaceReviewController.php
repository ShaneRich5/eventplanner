<?php

namespace App\Http\Controllers;

use App\Review;
use App\Place;
use Illuminate\Http\Request;

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
        //
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
        //
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
