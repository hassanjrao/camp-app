<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use Illuminate\Http\Request;

class CampController extends Controller
{

    public function index(){

        $camps=Camp::with(['campImages','campSessions'])->get();

        $camps=$camps->map(function($camp){

            $age_range=$camp->min_age;
            if($camp->max_age){
                $age_range.=" - ".$camp->max_age;
            }else{
                $age_range.=" >";
            }

            return [
                "id"=>$camp->id,
                "name"=>$camp->name,
                "price"=>$camp->price,
                "slug"=>$camp->slug,
                "description"=>$camp->description,
                "min_age"=>$camp->min_age,
                "max_age"=>$camp->max_age,
                "age_range"=>$age_range,
                "no_max_age"=>$camp->no_max_age,
                "max_registration"=>$camp->max_registration,
                "camp_image"=>$camp->campImages->first() ? asset("storage/".$camp->campImages->first()->image) : null,
                "total_sessions"=>$camp->campSessions->count(),
            ];
        });


        return view('front.camps.index',compact('camps'));

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


        return view('front.camps.camp-details',compact('camp','campSessions'));
    }

}
