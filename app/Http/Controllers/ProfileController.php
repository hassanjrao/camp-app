<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $orders=auth()->user()->orders()->with('items')->latest()->get();

        $orders=$orders->map(function($order){
            return [
                'id'=>$order->id,
                "order_id"=>$order->order_id,
                'total'=>$order->total,
                "created_at"=>$order->created_at,
                "status"=>"Paid",
                'items'=>$order->items->map(function($item){
                    return [
                        'id'=>$item->id,
                        'name'=>$item->name,
                        'price'=>$item->price,
                        'quantity'=>$item->quantity,
                    ];
                })
            ];
        });



        return view('front.profile.index',compact('orders'));

    }


    public function orderDetails($id){

        $order=Order::with(['items'])->findOrFail($id);


        $slotIds=$order->items->pluck('camp_session_slot_id')->toArray();

        $campIds=$order->items->pluck('campSession.camp_id')->unique()->toArray();



        $camps = Camp::whereIn("id", $campIds)->with("campSessions.campSessionSlots")->get();


        $camps = $camps->map(function ($camp) use ($slotIds) {
            return [
                "id" => $camp->id,
                "name" => $camp->name,
                "price" => $camp->price,
                // select camp sessions that have slots in order items
                "sessions" => $camp->campSessions->filter(function ($session) use ($slotIds) {
                    return $session->campSessionSlots->whereIn("id", $slotIds)->count();
                })->map(function ($session) use ($slotIds) {
                    return [
                        "id" => $session->id,
                        // convert date to
                        "start_date" => $session->start_date,
                        "end_date" => $session->end_date,
                        "slots" => $session->campSessionSlots->filter(function ($slot) use ($slotIds) {
                            return in_array($slot->id, $slotIds);
                        })->map(function ($slot) {
                            return [
                                "id" => $slot->id,
                                "start_time" => $slot->start_time,
                                "end_time" => $slot->end_time,
                            ];
                        }),
                    ];
                }),
            ];
        });





        return view('front.profile.order-details',compact('camps','order'));

    }
}
