<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Event;
use App\Location;
use Auth;
use App\Media;


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
        $media = Media::all();

        return view('dashboard/locations', [
            'media' => $media,
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

        return view('dashboard/location_add', [
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

        return back()->withInput()->with('status', 'Location Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::find($id);
        $media = Media::all();

        $image_keys = $location->images;
        $image_keys_array = explode(',',$image_keys);
        $images = [];
        foreach($image_keys_array as $k){
            $images[] = Media::find($k);
        }
        $location['images_full'] = $images;

        //return $location;

        return view('dashboard.location_show', [
            'location' => $location,
            'media' => $media,
            'used_images' => $image_keys_array
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
        $location = Location::find($id);
        return view('location.edit', compact('location'));
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

        $location = Location::find($id);
        $name = $request->get('name');
        $value = $request->get('value');
        $location->name = $value;
        $location->save();

        return $value;



        // if ($request->ajax()) {
        //     $pk     = $request->get('pk');
        //     $name   = $request->get('name');
        //     $value  = $request->get('value');
            
        //     $location        = Location::findOrFail($id);
        //     $location->$name = $value;
        //     $location->save();
            
        //     return response()->json(['success' => TRUE]);

        // }else {
        //     return 'Not and ajax call!';
        // }
        // request()->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);
/*

        $location = Location::find($id);
        $column_name = Location::get('name');
        $column_value = Location::get('value');
        
        if( Location::has('name') && Location::has('value')) {
            $location = Location::select()
                ->where('id', '=', $id)
                ->update([$column_name => $column_value]);
            return response()->json([ 'code'=>200], 200);
        }
        
        return response()->json([ 'error'=> 400, 'message'=> 'Not enought params' ], 400);



        $location = Location::find($id);
        $user = Auth::user();

        $location->name = $request->name;
        $location->address = $request->address;
        $location->city = $request->city;
        $location->state = $request->state;
        $location->zip = $request->zip;
        $location->floor = $request->floor;
        $location->description = $request->description;

        $location->contact = $request->contact;
        $location->contact_email = $request->contact_email;
        $location->contact_phone = $request->contact_phone;

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

        return redirect()->route('location.index')
                        ->with('success','Location updated successfully');
*/
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

        return response()->json(['success'=>'Location Updated.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $location = Location::findOrFail( $id );
        if ( $request->ajax() ) {

            $location->delete( $request->all() );

            return response(['msg' => 'Location deleted', 'status' => 'success']);
        }
        return response(['msg' => 'Failed deleting the location', 'status' => 'failed']);

        //Location::find($id)->delete();
        //return redirect()->route('location.index')
                        //->with('success','Location deleted successfully');
    }

    public function media(Request $request, $id)
    {
        $images_submitted = $request->input();
        $image_ids = '';
        foreach ($images_submitted as $k => $v){
            $image_ids .= ','.$v;
        }
        $image_ids = trim($image_ids, ',');
        $location = Location::find($id);
        $location->images = $image_ids;
        $location->save();

        return $location;


    }

}
