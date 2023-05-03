<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::latest()->get();

        return view('admin.users.index', compact('users'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $user=User::findOrFail($id);

        return view('admin.users.add_edit', compact('user'));
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$id,
            'address'=>'required',
            'phone'=>'required|unique:users,phone,'.$id,
            'password'=>'nullable|min:8',
            'emergency_contact_name'=>'required',
            'emergency_contact_phone'=>'required|unique:users,emergency_contact_phone,'.$id,
            "age"=>"required|numeric",
            "gender"=>"required|in:male,female,not specified",
            "parents_name"=>"required",
            "parents_email"=>"required|email|unique:users,parents_email,".$id,
            "parents_phone"=>"required|unique:users,parents_phone,".$id,

        ]);


        $user=User::findOrFail($id);

        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "address"=>$request->address,
            "phone"=>$request->phone,
            "emergency_contact_name"=>$request->emergency_contact_name,
            "emergency_contact_phone"=>$request->emergency_contact_phone,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "parents_name"=>$request->parents_name,
            "parents_email"=>$request->parents_email,
            "parents_phone"=>$request->parents_phone,

        ]);

        if($request->password){
            $user->update([
                "password"=>bcrypt($request->password)
            ]);
        }

        return redirect()->route('admin.users.index')->withToastSuccess('User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index')->withToastSuccess('User deleted successfully');
    }
}
