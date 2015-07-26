<?php

namespace App\Http\Controllers\Backend;

use App\User;
Use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.members.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        \Notification::warningInstant('Member creation only establishes a user in our system for Steam Login, they will STILL NEED to file an application and go through the enlistment process.');
        return view('backend.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'steam_id' => 'required',
            'application_id' => 'integer',
            'vpf_id' => 'integer',
            'email' => 'required|email',
            'okEmail' => 'required',
        ]);

        $user = new User;
        $user->steam_id = $request->steam_id;
        if ($request->has('application_id')) $user->application_id = $request->application_id;
        if ($request->has('vpf_id')) $user->vpf_id = $request->vpf_id;
        $user->email = $request->email;
        $user->okEmail = $request->okEmail;
        $user->save();

        $role = Role::where('name','user')->first();
        $user->attachRole($role);

        \Notification::success('User was created successfully');
        return redirect('/admin/members');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return redirect('admin/members');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $user_roles = [];
        foreach($user->roles as $role)
        {
            array_push($user_roles,$role->id);
        }
        return view('backend.members.edit')
            ->with('user',$user)
            ->with('roles',$roles)
            ->with('user_roles',$user_roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //return $request->roles;
        $this->validate($request, [
            'steam_id' => 'required',
            'application_id' => 'integer',
            'vpf_id' => 'integer',
            'email' => 'required|email',
        ]);

        $user = User::find($id);
        $user->steam_id = $request->steam_id;
        if ($request->has('application_id')) $user->application_id = $request->application_id;
        if ($request->has('vpf_id')) $user->vpf_id = $request->vpf_id;
        $user->email = $request->email;
        $user->save();

        // Deal with Roles - Ghetto Style
        foreach($user->roles as $role)
        {
            $getRole = Role::find($role->id);
            $user->detachRole($getRole);
        }
        foreach($request->roles as $role)
        {
            $getRole = Role::find($role);
            $user->attachRole($getRole);
        }

        \Notification::success('User was updated successfully');
        return redirect('/admin/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        \Notification::success('User Deleted Successfully');
        return redirect('admin/members');
    }
}
