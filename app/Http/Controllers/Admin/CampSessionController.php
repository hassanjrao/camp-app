<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\CampSession;
use Illuminate\Http\Request;

class CampSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions=CampSession::latest()->with(["camp","campSessionSlots"])->get();


        return view("admin.sessions.index",compact("sessions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $session=null;

        $camps=Camp::all();

        return view("admin.sessions.add_edit",compact("session","camps"));
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
            "camp_id"=>"required|exists:camps,id",
            "start_date"=>"required|date",
            "end_date"=>"required|date",
        ]);

        $session=CampSession::create([
            "camp_id"=>$request->camp_id,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date,
        ]);

        return redirect()->route("admin.sessions.index")->with("success","Session created successfully");
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
        $session=CampSession::findOrFail($id);

        $camps=Camp::all();

        return view("admin.sessions.add_edit",compact("session","camps"));
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
            "camp_id"=>"required|exists:camps,id",
            "start_date"=>"required|date",
            "end_date"=>"required|date",
        ]);

        $session=CampSession::findOrFail($id);

        $session->update([
            "camp_id"=>$request->camp_id,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date,
        ]);

        return redirect()->route("admin.sessions.index")->with("success","Session updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session=CampSession::findOrFail($id);

        $session->delete();

        return redirect()->route("admin.sessions.index")->with("success","Session deleted successfully");
    }


    public function slots($id)
    {
        $session=CampSession::findOrFail($id);

        $slots=$session->campSessionSlots()->latest()->with(["campSession","campSession.camp"])->get();

        return view("admin.slots.index",compact("slots","session"));
    }

}
