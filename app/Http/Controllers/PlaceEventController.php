<?php

namespace App\Http\Controllers;

use App\Repositories\Place\PlaceRepository as Place;
use App\Repositories\Event\EventRepository as Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceEventController extends Controller
{
    protected $place;
    protected $event;

    public function __construct(Place $place, Event $event)
    {
        $this->place = $place;
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  integer  $placeId
     * @return \Illuminate\Http\Response
     */
    public function index($placeId)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  integer  $placeId
     * @return \Illuminate\Http\Response
     */
    public function create($placeId)
    {
        $place = $this->place->find($placeId);
        return view('places.events.create', compact('place'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $placeIequest
     * @param  integer  $placeId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $placeId)
    {
        $user = Auth::user();
        $data = collect($request->only('name', 'description'))
                    ->merge(['user_id' => $user->id])
                    ->merge(['place_id' => $placeId])
                    ->toArray();
        $event = $this->event->create($data);
        return response()->json(['event' => $event]);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $placeId
     * @param  integer  $eventId
     * @return \Illuminate\Http\Response
     */
    public function show($placeId, $eventId)
    {
        $place = $this->place->find($placeId);
        $event = $this->event->find($eventId);
        return view('places.events.show', compact('place', 'event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $placeId
     * @param  integer  $eventId
     * @return \Illuminate\Http\Response
     */
    public function edit($placeId, $eventId)
    {
        $place = $this->place->find($placeId);
        $event = $this->event->find($eventId);
        return view('places.events.edit', compact('place', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $placeId
     * @param  integer  $eventId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $placeId, $eventId)
    {
        $data = $request->only('name', 'description');
        $event = $this->event->update($data, $eventId);
        return response()->json(['event' => $event]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $placeId
     * @param  integer  $eventId
     * @return \Illuminate\Http\Response
     */
    public function destroy($placeId, $eventId)
    {
        //
    }
}
