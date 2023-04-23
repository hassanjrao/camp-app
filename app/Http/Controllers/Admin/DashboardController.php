<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Camp;
use App\Models\CampSession;
use App\Models\CampSessionSlot;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $camps=Camp::all()->count();
        $sessions=CampSession::all()->count();
        $slots=CampSessionSlot::all()->count();
        $users=User::all()->count();
        $orders=Order::all()->count();

        return view("admin.dashboard",compact("camps","sessions","slots","users","orders"));

    }
}
