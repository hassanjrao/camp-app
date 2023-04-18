<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{

    public function index(){

    }

    public function show($id,$slug)
    {
        // dd session


        $camp = Camp::findorfail($id);

        $camp->image=$camp->campImages->first()->image;

        $campSessions=$camp->campSessions()->whereHas("campSessionSlots")->with('campSessionSlots')->get();

        $campSessions=$campSessions->map(function($session){

            return [
                "id"=>$session->id,
                "image"=>$session->image,
                // convert date to
                "start_date"=>$session->start_date,
                "end_date"=>$session->end_date,
                "session_slots"=>$session->campSessionSlots->map(function($slot){
                    return [
                        "id"=>$slot->id,
                        "start_time"=>$slot->start_time,
                        "end_time"=>$slot->end_time,
                    ];
                }),
            ];

        });


        return view('front.camp-details',compact('camp','campSessions'));
    }

}
