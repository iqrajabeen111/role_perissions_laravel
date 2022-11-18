<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @var \App\Models\User|null
     */
    private $userModel = null;


    /**
     * @var \App\Models\Role|null
     */
    private $roleModel = null;

    public function __construct(User $userModel, Role $roleModel)
    {
        $this->userModel = $userModel;
        $this->roleModel = $roleModel;
    }

    public function index()
    {
        $user = $this->userModel->all();
        return view('User-List', ['users' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = $this->roleModel->get();
        return view('Add-User', ['roles' => $role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $data = $request->all();
        $user = $this->userModel->create([
            'name' => $data['name'],
            'email' => $data['email'],

        ]);

        $role = $this->roleModel->find($request->role);

        $user->roles()->attach($role->id);

        return redirect()->back()->with('message', 'user Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(1);
        $response =  $user->HasPermission('create-users');//check user has permission or not
        // $response =  $user->HasAnyPermissions(['create-post','delete-user']);//check if user has any permission or not
        // $response =  $user->HasAllPermissions(['create-post','delete-users']);//check if user has all permission or not
      
        return response()->json([
            'permission' => $response,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = $this->userModel->find($user_id);
        $roles = $this->roleModel->get();
        return view('Edit-User', ['user' => $user, 'roles' => $roles]);
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
        $user = $this->userModel->find($id);
        $user->name =  $request->get('name');
        $user->save();

        $user->roles()->sync($request->role);
        return redirect()->route('users.index')->with('success', 'user updated.');
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
