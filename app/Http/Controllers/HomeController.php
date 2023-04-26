<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Camp;
use App\Models\Carousal;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $camps=Camp::with(['campImages','campSessions'])->get();

        $camps=$camps->map(function($camp){

            $age_range=$camp->min_age;
            if($camp->max_age){
                $age_range.=" - ".$camp->max_age;
            }else{
                $age_range.=" >";
            }

            $ageRangeArr=range($camp->min_age,$camp->no_max_age ? 200 : $camp->max_age);


            return [
                "id"=>$camp->id,
                "name"=>$camp->name,
                "price"=>$camp->price,
                "slug"=>$camp->slug,
                "description"=>$camp->description,
                "min_age"=>$camp->min_age,
                "max_age"=>$camp->max_age,
                "age_range_array"=>$ageRangeArr,
                
                "age_range"=>$age_range,
                "no_max_age"=>$camp->no_max_age,
                "max_registration"=>$camp->max_registration,
                "camp_image"=>$camp->campImages->first() ? asset("storage/".$camp->campImages->first()->image) : null,
                "total_sessions"=>$camp->campSessions->count(),
            ];
        });

        $carousal=Carousal::first();

        $aboutUs=AboutUs::first();

        return view('front.index',compact('camps','carousal','aboutUs'));
    }
}
