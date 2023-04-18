<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\CampSessionSlot;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function index(){
        return view("front.carts.index");
    }


    public function add(Request $request)
    {
        $request->validate([
            "slot_id" => "required|exists:camp_session_slots,id",
        ]);

        // add slot to session
        $request->session()->push("cart.slots", $request->slot_id);


        return response()->json([
            "message" => "Slot added to cart",
            "cart" => $request->session()->get("cart"),
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            "slot_id" => "required|exists:camp_session_slots,id",
        ]);


        // remove the slot_id from the session
        $cartItems=session()->get("cart.slots");

        // remove slot_id form cartItems array
        $cartItems=array_diff($cartItems,[$request->slot_id]);


        // update session
        $request->session()->put("cart.slots",$cartItems);


        return response()->json([
            "message" => "Slot removed from cart",
            // "cart" => $request->session()->get("cart"),
        ]);
    }
}
