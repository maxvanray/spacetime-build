<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar;
use App\Event;
use App\Location;
use App\User;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $events = Event::all();
        return view('dashboard/calendar', [
            'user' => $user, 
            'events' => $events
        ]);
    }

    public function events()
    {
        $user = Auth::user();
        $events = Event::all();
        return view('dashboard/events', [
            'user' => $user, 
            'events' => $events
        ]);
    }

    public function eventlist()
    {
        $events = Event::all();
        return $events;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $events = Event::all();
        $locations = Location::all();
        return view('dashboard/events_add', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:100',
            'type'=>'required'
        ]);

        $event = Event::create($request->all());
        if($request->ajax()){
            return response()->json(['success'=>'A new event has been created.']);
        }
        return redirect()->route('events');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendar = Calendar::where('event_id', '=', $id)->get();
        $event = Event::find($id);
        $user = Auth::user();
        return view('dashboard/events_show', [
            'calendar' => $calendar,
            'user' => $user, 
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
