<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CampController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camps=Camp::latest()->with(["campSessions","campSessions.orderItems"])->get();

        $camps=$camps->map(function($camp){


            return [
                "id"=>$camp->id,
                "name"=>$camp->name,
                "min_age"=>$camp->min_age,
                "max_age"=>$camp->max_age,
                "no_max_age"=>$camp->no_max_age,
                "price"=>$camp->price,
                "max_registration"=>$camp->max_registration,
                "description"=>substr($camp->description,0,50) . "...",
                "total_sessions"=>$camp->campSessions->count(),
                "total_participants"=>$camp->campSessions->map(function($session){


                    return $session->orderItems->count();
                })->sum(),
                'created_at'=>$camp->created_at,
                'updated_at'=>$camp->updated_at,
            ];

        });


        return view("admin.camps.index",compact("camps"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $camp=null;

        return view("admin.camps.add_edit",compact("camp"));
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
            "name"=>"required|unique:camps,name",
            "min_age"=>"required|numeric|gte:0",
            "max_age"=>"nullable|numeric|gte:0",
            "no_max_age"=>"nullable",
            "price"=>"required|numeric",
            "max_registration"=>"required|numeric|gte:0",
            "description"=>"required",
        ]);

        $slug=Str::slug($request->name);

        Camp::create([
            "name"=>$request->name,
            "slug"=>$slug,
            "min_age"=>$request->min_age,
            "max_age"=>$request->max_age,
            "no_max_age"=>$request->no_max_age=="on"?1:0,
            "price"=>$request->price,
            "max_registration"=>$request->max_registration,
            "description"=>$request->description,
        ]);

        return redirect()->route("admin.camps.index")->withToastSuccess("Camp created successfully");
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
        $camp=Camp::findOrFail($id);

        return view("admin.camps.add_edit",compact("camp"));
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
            "name"=>"required|unique:camps,name,".$id,
            "min_age"=>"required|numeric|gte:0",
            "max_age"=>"nullable|numeric|gte:0",
            "no_max_age"=>"nullable",
            "price"=>"required|numeric",
            "max_registration"=>"required|numeric|gte:0",
            "description"=>"required",
        ]);

        $slug=Str::slug($request->name);

        $camp=Camp::findOrFail($id);

        $camp->update([
            "name"=>$request->name,
            "slug"=>$slug,
            "min_age"=>$request->min_age,
            "max_age"=>$request->max_age,
            "no_max_age"=>$request->no_max_age=="on"?1:0,
            "price"=>$request->price,
            "max_registration"=>$request->max_registration,
            "description"=>$request->description,
        ]);

        return redirect()->route("admin.camps.index")->withToastSuccess("Camp updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camp=Camp::findOrFail($id);

        $camp->delete();

        return redirect()->route("admin.camps.index")->withToastSuccess("Camp deleted successfully");
    }

    public function sessions($id)
    {
        $camp=Camp::findOrFail($id);

        $sessions=$camp->campSessions()->with(["camp","campSessionSlots"])->latest()->get();

        return view("admin.sessions.index",compact("camp","sessions"));
    }
}
