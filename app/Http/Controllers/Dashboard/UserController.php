<?php

namespace App\Http\Controllers\Dashboard;

use App\UserAttribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Activities;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
    public function index(Request $request)
    {
        $user = Auth::user();
        $users = User::get();

        return view('dashboard.users.index', [
            'users' => $users
        ]);
    }

    public function addUser()
    {

        //$user = User::find(1);
        $user = Auth::user();

        return view('dashboard.users.create', [
            'user' => $user
        ]);
    }

    public function addUserPost(Request $request)
    {
        $user = Auth::user();

        return view('dashboard.users.new', [
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

        return view('dashboard.users.profile', [
            'user' => $user,
            'guests' => $guests
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $user = Auth::user();
        $roles = Role::get();

        return view('dashboard.users.create', [
            'user' => $user,
            'roles' => $roles
        ]);
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
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create($request->only('email', 'name', 'password'));

        $roles = $request['roles']; //Retrieving the roles field
        //Checking if a role was selected
        if (isset($roles)) {
            foreach ($roles as $role) {
                $role_r = Role::where('id', '=', $role)->firstOrFail();
                $user->assignRole($role_r); //Assigning role to user
            }
        }
        //Redirect to the users.index view and display message
        return redirect()->route('dashboard.users.index')
            ->with('flash_message',
                'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('dashboard.users.index', [
            'user'=>$user
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
        $user = User::find($id);
        $roles = Role::get();

        return view('dashboard.users.edit', [
            'user' => $user,
            'roles'=>$roles
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
        $user = User::findOrFail($id); //Get role specified by id

        //Validate name, email and password fields
        $this->validate($request, [
            'name' => 'required|max:120',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6|confirmed'
        ]);
        $input = $request->only(['name', 'email', 'password']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        } else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('dashboard.users.index')
            ->with('flash_message',
                'User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.users.index')
            ->with('flash_message',
                'User '. $user->name . ' successfully deleted.');
    }

}
