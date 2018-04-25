<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Event;
use Auth;
use App\Media;
use File;
use Storage;
use Validator;
use DB;
use Intervention\Image\ImageManagerStatic as InterventionImage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();

        $media_categories = '';
        foreach ($images as $m) {
            $media_categories .= ',' . $m->categories;
        }
        $media_categories = str_replace("-", " ", $media_categories);
        $categories_array = explode(",", $media_categories);
        $categories_unique = array_unique($categories_array);
        $categories = array_filter($categories_unique);
        sort($categories);

        $clean_categories = [];
        foreach ($categories as $cat) {
            $clean_categories[$cat] = $this->replaceAll($cat);
        }

        $user = Auth::user();
        $events = Event::all();


        return view('dashboard.images.index', [
            'clean_categories' => $clean_categories,
            'categories' => $categories,
            'images' => $images,
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
        $images = Image::all();
        $user = Auth::user();
        $events = Event::all();

        return view('dashboard.images.create', [
            'images' => $images,
            'user' => $user,
            'events' => $events
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $user = Auth::user();
            $destination_path = 'media_library';
            $file = $request->file('image');
            $extension = strtolower($file->getClientOriginalExtension());
            $filename_original = $file->getClientOriginalName();
            $mime_type = $file->getClientMimeType();
            $filename = $user->id . '-' . uniqid() . '.' . $extension;
            $img = InterventionImage::make($file->getRealPath());
            $img->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('/' . $destination_path) . '/' . $filename);
            $media_item = new Image;
            $media_item->name = $request->name;
            $media_item->filename_original = $filename_original;
            $media_item->filename = $filename;
            $media_item->type = $mime_type;
            $media_item->description = $request->description;
            $media_item->active = 1;
            $media_item->location = $destination_path;
            $media_item->created_by = $user->id;
            $media_item->save();
            return redirect(route('dashboard.images.index'))->with('status', 'Success');
        }else{
            return redirect(route('dashboard.images.index'))->with('erroe', 'An image was not recorded.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $images = Image::all();
        $user = Auth::user();
        $events = Event::all();

        return view('dashboard.images.edit', [
            'image' => $image,
            'images' => $images,
            'user' => $user,
            'events' => $events
        ]);
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
