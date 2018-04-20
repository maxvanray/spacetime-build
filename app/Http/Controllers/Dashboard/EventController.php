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
        $events = Event::latest('id')->get();
        return view('dashboard.events.index', [
            'user' => $user,
            'events' => $events
        ]);
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
        return view('dashboard.events.create', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100'
        ]);

        $event = Event::create($request->all());
        if ($request->ajax()) {
            return response()->json(['success' => 'A new event has been created.']);
        }
        return redirect()->route('dashboard.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendar = Calendar::where('event_id', '=', $id)->get();
        $event = Event::find($id);
        $user = Auth::user();
        return view('dashboard.events.edit', [
            'calendar' => $calendar,
            'user' => $user,
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendar = Calendar::where('event_id', '=', $id)->get();
        $event = Event::find($id);
        $user = Auth::user();
        return view('dashboard.events.edit', [
            'calendar' => $calendar,
            'user' => $user,
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('dashboard.events.index')
            ->with('flash_message',
                'Event ' . $event->name . ' deleted!');
    }
}
