<?php

namespace App\Http\Controllers;

use App\Repositories\Place\PlaceRepository as Place;
use App\Repositories\Event\EventRepository as Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = $this->place->all();
        return view('places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = collect($request->only('name', 'description'))
                    ->merge(['user_id' => $user->id])
                    ->toArray();

        $place = $this->place->create($data);
        return response()->json(['place' => $place]);
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = $this->place->find($id);
        $events = $this->event->findByPlaceId($id);
        return view('places.show', compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = $this->place->find($id);
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->only('name', 'description');
        $place = $this->place->update($data, $id);
        return response()->json(['place' => $place]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->json([
            'success' => $this->place->destroy()
        ]);
    }
}
