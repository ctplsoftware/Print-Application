<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\organization_master;
use App\Models\Role;
use Hash;
use Auth;
use Exception;


class UserController extends Controller
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
        // dd('test');
        $roles = Role::get();
       $organizations = organization_master::where('status','Active')->get();




        return view('user.create',compact('roles','organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            // dd($request->all());
            $userNameExists = User::where('username', $request->username)->exists();
            // dd($userNameExists);

            if ($userNameExists) {
                $message = 'User Name already exists';
                return redirect()->back()->with('error', $message);
            }

            if ($request->password !== $request->confirm_password) {
                $message = 'Password does not match';
                return redirect()->back()->with('error', $message);
            }

            $input = $request->all();
            $input['name'] = $input['name'];
            $input['email'] = $input['email'];
            $input['password'] = Hash::make($input['password']);
            $input['confirm_password'] = Hash::make($input['confirm_password']);
            $input['role_id'] = $input['role_id'];
            $input['unit_id'] = $input['unit_id'];
            $input['created_by'] = Auth::user()->id;
            $input['updated_by'] = Auth::user()->id;
            $input['username'] = $input['username'];
            $input['status'] = 'Active';

            $user = User::create($input);

            $message = 'Form submitted successfully.';
            return redirect('/users/show')->with('success', $message);
        } catch (Exception $e) {
            // dd($e);
            // Handle exceptions if necessary
            return redirect()->back()->with('error', 'Error occurred while processing the request.');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,string $id)
    {
        //
        try{
            $data=User::get();
            // dd($data[0]->roleDetails->);
            $userPermission['create'] = Auth::user()->checkPermission(['user_create']);
            return view("user.index",compact('data','userPermission'))->with('i', ($request->input('page', 1) - 1) * 5);

        }
        catch(Exception $e){
            // dd($e);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        try{
            $user = User::find($id);
            // dd($id);
            // $user->role_id = $user->roles->pluck('id')->first();
            $userRole = Role::find($user->role_id);
            $getRoleNames = Role::get();
        $user2 = User::where('id',$id)->first();

       $organizations = organization_master::where('status','Active')->get();

            // dd($user2,$user->role_id,$getRoleNames);
            return view('user.edit',compact('user2', 'user','getRoleNames','organizations'));
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
        //  dd($request->all(),'kjhgf');
         $user = User::find($id);
         $user->name = $request->name;
         $user->email = $request->email;
         $user->username = $request->username;
         $user->role_id = $request->roles;
         $user->unit_id = $request->organization;
         $user->status = $request->status;

         // Save the user
         $user->save();

         return redirect('/users/index')->with('success', 'Form updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function changepassword()
    {
        // dd('change password');
        // $user = User::find($id);

        return view('user.editpassword');
    }
    public function editpassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        // dd($request->all());

        return back()->with("status", "Password changed successfully!");
    }

    // public function userNameChange(Request $request)
    // {
    //     $userNameExists = user::where('username', $request->userName)->exists();
    //     $message = $userNameExists ? 'User Name already exists' : 'UOM is available';
    //     return response()->json(['exists' => $userNameExists, 'message' => $message]);
    // }
}
