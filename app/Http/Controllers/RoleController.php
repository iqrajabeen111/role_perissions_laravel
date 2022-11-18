<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
        /**
     * @var \App\Models\Role|null
     */
    private $roleModel = null;
        /**
     * @var \App\Models\Permission|null
     */
    private $permissionModel = null;

    public function __construct(Role $roleModel,Permission $permissionModel)
    {
        $this->roleModel = $roleModel;
        $this->permissionModel = $permissionModel;
    }

    public function index()
    {
        $role= $this->roleModel->all();
        return view('Role-List',['roles'=>$role]);   
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permission = $this->permissionModel->get();
        // return view('Add-Role', ['permissions' => $permission]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        // ]);

        // $data = $request->only(['name']);
        // $role = $this->roleModel->create([
        //     'name' => $data['name'],
        // ]);

        // $permission = $this->permissionModel->find($request->permission);
      
        // $role->permissions()->attach($permission->id);

        // return redirect()->back()->with('message', 'Role Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($role_id)
    {
        $role = $this->roleModel->find($role_id);
        $permissions = $this->permissionModel->get();
        return view('Assigned-Permissions', ['permissions' => $permissions, 'role' => $role]);
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
        $role = $this->roleModel->find($id);
        $role->name =  $request->get('name');
        $role->save();
       
        $role->permissions()->sync($request->permission);
        return redirect()->route('roles.index')->with('success', 'permissions updated.');
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
