<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $orders=auth()->user()->orders()->with('items')->get();


        return view('front.profile.index',compact('orders'));

    }
}
