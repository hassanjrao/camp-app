<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\CampSession;
use App\Models\CampSessionSlot;
use Illuminate\Http\Request;

class CampSessionSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slots=CampSessionSlot::latest()->with(["campSession","campSession.camp"])->get();

        return view("admin.slots.index",compact("slots"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slot=null;

        $camps=Camp::all();
        $sessions=[];

        return view("admin.slots.add_edit",compact("slot","camps","sessions"));
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
            "session_id"=>"required|exists:camp_sessions,id",
            "start_time"=>"required",
            "end_time"=>"required",
        ]);

        $slot=CampSessionSlot::create([
            "camp_session_id"=>$request->session_id,
            "start_time"=>$request->start_time,
            "end_time"=>$request->end_time,
        ]);

        return redirect()->route("admin.slots.index")->with("success","Slot created successfully");
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
        $slot=CampSessionSlot::with(["campSession","campSession.camp"])->findOrFail($id);

        $camps=Camp::all();
        $sessions=CampSession::where("camp_id",$slot->campSession->camp_id)->get();

        return view("admin.slots.add_edit",compact("slot","camps","sessions"));
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
            "session_id"=>"required|exists:camp_sessions,id",
            "start_time"=>"required",
            "end_time"=>"required",
        ]);

        $slot=CampSessionSlot::findOrFail($id);

        $slot->update([
            "camp_session_id"=>$request->session_id,
            "start_time"=>$request->start_time,
            "end_time"=>$request->end_time,
        ]);

        return redirect()->route("admin.slots.index")->with("success","Slot updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slot=CampSessionSlot::findOrFail($id);

        $slot->delete();

        return redirect()->route("admin.slots.index")->with("success","Slot deleted successfully");
    }

    public function getCampSessions(Request $request){

        $request->validate([
            "camp_id"=>"required|exists:camps,id",
        ]);

        $sessions=CampSession::where("camp_id",$request->camp_id)->get();

        return response()->json([
            "data"=>[
                "sessions"=>$sessions,
            ]
        ]);

    }
}
