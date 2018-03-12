<?php

namespace App\Http\Controllers;

use App\Event;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function create(Place $place)
    {
        return view('places.events.create', compact('place'));
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
        $data = $request->only('name', 'description');
        $event = new Event($data);
        $event->user_id = $user->id;
        $event->place_id = $place->id;
        $event->save();
        return response()->json(['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place, Event $event)
    {
        return view('places.events.show', compact('place', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place, Event $event)
    {
        return view('places.events.edit', compact('place', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place, Event $event)
    {
        $data = $request->only('name', 'description');
        $event->update($data);
        return response()->json([
            'event' => $event
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place, Event $event)
    {
        //
    }
}
