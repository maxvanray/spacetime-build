<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calendar;
use App\Event;
use App\User;
use Auth;
use App\Location;


class CalendarController extends Controller
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
        $locations = Location::all();

        return view('dashboard.calendar.index', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations
        ]);
    }

    public function locationCalendar($location_id)
    {
        $user = Auth::user();
        $events = Event::all();
        $locations = Location::all();
        $location = Location::find($location_id);

        return view('dashboard/calendar_location', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations,
            'location' => $location
        ]);
    }

    public function calendarList($location)
    {
        $calendar = Calendar::where('location', '=', $location)->get();
        return response($this->transformCollection($calendar));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $event_id = $input['event'];
        $user = Auth::user();
        $event = Event::find($event_id);
        $calendar = New Calendar();
        if (!empty($event_id)) {
            $calendar->event_id = $event_id;
            $calendar->price = $event->price;
            $calendar->title = $event->name;
            $calendar->description = $event->description;
            $calendar->created_by = $user->id;
        }
        $calendar->location = $input['location'];
        $calendar->background_color = $input['backgroundColor'];
        $calendar->start = $input['date'];
        $calendar->all_day = $input['all_day'];
        $calendar->save();
        return $calendar;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $events = Event::all();
        $locations = Location::all();
        $location = Location::find($id);

        return view('dashboard.calendars.show', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations,
            'location' => $location
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $input = $request->all();

        $calendar_id = $input['id'] ?? '';
        $start = $input['start'] ?? '';
        $end = $input['end'] ?? '';
        $all_day = $input['all_day'] ?? '';

        $calendar = Calendar::find($calendar_id);
        $calendar->all_day = $all_day;
        $calendar->end = $end;
        $calendar->start = $start;
        $calendar->save();

        return response($calendar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * @param $parameters
     * @return array
     */
    private function transformCollection($parameters)
    {
        $collection = array_map([$this, 'transform'], $parameters->toArray());
        return $collection;
    }

    /**
     * @param $param
     * @return array
     */
    private function transform($param)
    {
        return [
            'id' => ($param['id'] === null ? '' : $param['id']),
            'event_id' => ($param['event_id'] === null ? '' : $param['event_id']),
            'title' => ($param['title'] === null ? '' : $param['title']),
            'description' => ($param['description'] === null ? '' : $param['description']),

            'start' => ($param['start'] === null ? '' : $param['start']),
            'end' => ($param['end'] === null ? '' : $param['end']),
            'allDay' => ($param['all_day'] === null ? '' : $param['all_day']),

            'color' => ($param['background_color'] === null ? '' : '#' . $param['background_color']),
            'facilitator' => ($param['facilitator'] === null ? '' : User::find($param['facilitator'])),
            'location' => ($param['location'] === null ? '' : Location::find($param['location'])),
            'price' => ($param['price'] === null ? '' : $param['price'] / 100),
            'backgroundColor' => ($param['background_color'] === null ? '' : $param['background_color']),
            'created_by' => ($param['created_by'] === null ? '' : User::find($param['created_by'])),
            'created_at' => ($param['created_at'] === null ? '' : $param['created_at']),
            'updated_at' => ($param['updated_at'] === null ? '' : $param['updated_at']),
        ];
    }


}
