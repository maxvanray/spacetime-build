<?php

namespace App\Http\Controllers\Dashboard;

use App\UserAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Activities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guests(Request $request)
    {
        $user = Auth::user();
        $guests = User::get();

        return view('dashboard/guests', [
            'user' => $user,
            'guests' => $guests
        ]);
    }

    public function staff(Request $request)
    {
        $user = Auth::user();
        $staff = DB::table('user_staff')
            ->leftJoin('users', 'users.id', '=', 'user_staff.user_id')
            ->get();

        return view('dashboard/staff', [
            'user' => $user,
            'staff' => $staff
        ]);
    }

    public function addUser(Request $request)
    {

        //$user = User::find(1);
        $user = Auth::user();

        return view('dashboard/addnew_user', [
            'user' => $user
        ]);
    }

    public function addUserPost(Request $request)
    {
        $user = Auth::user();

        return view('dashboard/addnew_user', [
            'user' => $user
        ]);
    }

    public function profile(Request $request, $id = '')
    {
        if (empty($id)) {
            $id = Auth::id();
        }
        //$user = User::find(1);
        //$user = Auth::user();
        $user = User::find($id);
        $guests = User::get();

        return view('dashboard/user_profile', [
            'user' => $user,
            'guests' => $guests
        ]);
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

    public function dateformat($date)
    {
        $a = strtotime($date);
        return date('Y-m-d H:i:s', $a);
    }

    public function attributes(Request $request, $id)
    {
        $user_attributes = UserAttribute::findOrFail($id);
        $input = $request->all();
        $name = $input['name'];
        $value = $input['value'];

        $user_attributes->$name = $value;
        $user_attributes->save();

        return response('success', 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $dob = $request->dob;
        $user->dob = $this->dateformat($dob);
        if ($request->hasFile('picfile')) {
            $avatar = $request->file('picfile');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
        } else {
            $filename = 0;
        }
        $user->pic = $filename;
        $user->bio = $request->bio;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->country = request()->ip();
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip = $request->postal;
        $user->facebook = '';
        $user->twitter = '';
        $user->instagram = '';
        $user->snapchat = '';
        $user->linkedin = '';
        $user->username = str_random(10);
        $user->user_id = rand(100000, 999999);
        $user->last_login = Carbon::now();
        $user->name = $request->first_name . ' ' . $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->pin = rand(10000, 99999);
        $user->save();

        return response('success', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', '=', $id)->first();
//        $user['attributes'] = User::find($id)->attributes;
        $user_attributes = User::find($id)->attributes;

        //return $user;
        return view('dashboard.user_show',
            compact('user'),
            compact('user_attributes')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = '')
    {
        $user = User::find(1);
        //return $user;
        return view('dashboard/edit_user', ['user' => $user]);
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
        if ($request->name == 'email') {
            $validatedData = $request->validate([
                'value' => 'email|unique:users,email|max:190'
            ]);
        } else {
            $validatedData = $request->validate([
                'value' => 'max:190'
            ]);
        }


        $user = User::find($id);
        $name = $request->get('name');
        $value = $request->get('value');
        $user->$name = $value;
        $user->save();

        return $value;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'success';
    }
}
