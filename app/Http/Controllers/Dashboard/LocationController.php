<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Event;
use App\Location;
use Auth;
use App\Media;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
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

        return view('dashboard.locations.index', [
            'user' => $user,
            'events' => $events,
            'locations' => $locations
        ]);
    }

    public function getEvents()
    {
        $user = Auth::user();
        $events = Event::all();

        return view('dashboard/location_add', ['user' => $user, 'events' => $events]);
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

        return view('dashboard.locations.create', [
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
        $user = Auth::user();

        $location = new Location;
        $location->name = $request->name;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->zip = $request->zip;
        $location->floor = $request->floor;
        $location->description = $request->description;

        $location->contact = $request->contact;
        $location->email = $request->email;
        $location->phone = $request->phone;

        $location->sunday_from = $request->sunday_from;
        $location->sunday_to = $request->sunday_to;
        $location->sunday_notes = $request->sunday_notes;
        $location->closed_sunday = $request->closed_sunday;

        $location->monday_from = $request->monday_from;
        $location->monday_to = $request->monday_to;
        $location->monday_notes = $request->monday_notes;
        $location->closed_monday = $request->closed_monday;

        $location->tuesday_from = $request->tuesday_from;
        $location->tuesday_to = $request->tuesday_to;
        $location->tuesday_notes = $request->tuesday_notes;
        $location->closed_tuesday = $request->closed_tuesday;

        $location->wednesday_from = $request->wednesday_from;
        $location->wednesday_to = $request->wednesday_to;
        $location->wednesday_notes = $request->wednesday_notes;
        $location->closed_wednesday = $request->closed_wednesday;

        $location->thursday_from = $request->thursday_from;
        $location->thursday_to = $request->thursday_to;
        $location->thursday_notes = $request->thursday_notes;
        $location->closed_thursday = $request->closed_thursday;

        $location->friday_from = $request->friday_from;
        $location->friday_to = $request->friday_to;
        $location->friday_notes = $request->friday_notes;
        $location->closed_friday = $request->closed_friday;

        $location->saturday_from = $request->saturday_from;
        $location->saturday_to = $request->saturday_to;
        $location->saturday_notes = $request->saturday_notes;
        $location->closed_saturday = $request->closed_saturday;

        $location->images = "";

        $location->created_by = $user->id;
        $location->last_edited_by = $user->id;

        $location->save();

        return redirect()->route('dashboard.locations.index') ->with('flash_message',
            'Location ' . $location->name . ' created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        $media = Media::all();
        $image_keys = $location->images;
        $image_keys_array = explode(',', $image_keys);
        $images = [];
        foreach ($image_keys_array as $k) {
            $images[] = Media::find($k);
        }
        $location['images_full'] = $images;

        return view('dashboard.location_show', [
            'location' => $location,
            'media' => $media,
            'used_images' => $image_keys_array
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {

        //return $location->images()->get();

//        $media = Images::where('active', '=', '1')->get();
//
//        $images = [];
//        $image_keys[] = json_decode($location->images);
//        if(!empty($image_keys)){
//            foreach ($image_keys as $k) {
//                $images[] = Media::find($k);
//            }
//        }
//        $location['images_full'] = $image_keys;

        return view('dashboard.locations.edit')->with(compact('location'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $name = $request->get('name');
        $value = $request->get('value');
        $location->created_by = '';
        $location->created_by = Auth::id();
        $location->$name = $value;
        $location->save();
        return $value;
    }

    /**
     * Update the images for the location.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateImages(Request $request, Location $location)
    {
        $images = $request->input('image.*');
        $location->images = json_encode($images);
        $location->save();
        return $images;
    }

    public function updateLocationTime(Request $request, $id)
    {

        $location = Location::find($id);

        $location->sunday_from = $request->sunday_from;
        $location->sunday_to = $request->sunday_to;
        $location->sunday_notes = $request->sunday_notes;
        $location->closed_sunday = $request->closed_sunday;

        $location->monday_from = $request->monday_from;
        $location->monday_to = $request->monday_to;
        $location->monday_notes = $request->monday_notes;
        $location->closed_monday = $request->closed_monday;

        $location->tuesday_from = $request->tuesday_from;
        $location->tuesday_to = $request->tuesday_to;
        $location->tuesday_notes = $request->tuesday_notes;
        $location->closed_tuesday = $request->closed_tuesday;

        $location->wednesday_from = $request->wednesday_from;
        $location->wednesday_to = $request->wednesday_to;
        $location->wednesday_notes = $request->wednesday_notes;
        $location->closed_wednesday = $request->closed_wednesday;

        $location->thursday_from = $request->thursday_from;
        $location->thursday_to = $request->thursday_to;
        $location->thursday_notes = $request->thursday_notes;
        $location->closed_thursday = $request->closed_thursday;

        $location->friday_from = $request->friday_from;
        $location->friday_to = $request->friday_to;
        $location->friday_notes = $request->friday_notes;
        $location->closed_friday = $request->closed_friday;

        $location->saturday_from = $request->saturday_from;
        $location->saturday_to = $request->saturday_to;
        $location->saturday_notes = $request->saturday_notes;
        $location->closed_saturday = $request->closed_saturday;

        $location->save();

        return response()->json(['success' => 'Location Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $location = Location::find($id);
        $location->delete($request->all());
        return redirect()->route('dashboard.locations.index') ->with('flash_message',
            'Location ' . $location->name . ' deleted!');

        //return response(['msg' => 'Failed deleting the location', 'status' => 'failed']);

        //Location::find($id)->delete();
        //return redirect()->route('location.index')
        //->with('success','Location deleted successfully');
    }

    public function media(Request $request, Location $location)
    {
        $images_submitted = $request->input();
        $image_ids = '';
        foreach ($images_submitted as $k => $v) {
            $image_ids .= ',' . $v;
        }
        $image_ids = trim($image_ids, ',');
        $location->images = $image_ids;
        $location->save();

        return $location;
    }

}
