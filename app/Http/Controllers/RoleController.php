<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\permission;
use App\Models\Rolehaspermission;
use DB;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $permission_data =Permission::get();
        // dd( $permission_data);

        return view('role.create',compact('permission_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
      $role=  Role::create([
            'name' => $request->input('role'),
            'guard_name'=>'web',
        ]);
        $permissions = $request->input('permissions', []);
        // dd( $permissions);
       
        foreach ($permissions as $permission) {
            Rolehaspermission::create([
                'role_id' => $role->id,
                'permission_id' => $permission,
            ]);
        }
        
        return redirect('/roles/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
    {
        //
        // dd('ttyugbyjg');
        $data = Role::get();
        return view("role.index",compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try{
            $role = role::find($id);
            // dd($role->name);
            $permission_data =Permission::get();
            $permission_data_select = Rolehaspermission::where('role_id',$role->id)->get();
            // dd($permission_data_select);
        
            return view('role.edit',compact('role','permission_data','permission_data_select'));
        }
        catch(Exception $e){
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->all());
        $role = Role::find($id);
        $role->name = $request->name;
        // Save the user
        $role->save();

      

        $permissions = $request->input('permissions', []);
        // dd( $permissions);
        DB::table('role_has_permission')->where('role_id',$role->id)->delete();
        foreach ($permissions as $permission) {
            Rolehaspermission::create([
                'role_id' => $role->id,
                'permission_id' => $permission,
            ]);
        }
        return redirect('/roles/index')->with('success', 'Form updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function permission(Request $request){
        $permissions = Permission::get();
        $rolestobe = Role::get();

        return view('role.permission', compact('permissions', 'rolestobe'));
    }
}
