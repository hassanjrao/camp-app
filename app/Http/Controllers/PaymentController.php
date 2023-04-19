<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\CampSessionSlot;
use Illuminate\Http\Request;
use Nikolag\Square\Facades\Square;

class PaymentController extends Controller
{


    public function store(Request $request)
    {

        $cartItems = session()->get("cart.slots");

        if (!$cartItems) {
            return;
        }

        // remove duplicates
        $cartItems = array_unique($cartItems);

        // get slots
        $slots = CampSessionSlot::whereIn("id", $cartItems)->get();

        // group slots by camp
        $camps = Camp::whereIn("id", $slots->pluck("campSession.camp.id"))->with("campSessions.campSessionSlots")->get();

        $camps = $camps->map(function ($camp) use ($cartItems) {
            return [
                "id" => $camp->id,
                "name" => $camp->name,
                "price" => $camp->price,
                // select camp sessions that have slots in cart
                "sessions" => $camp->campSessions->filter(function ($session) use ($cartItems) {
                    return $session->campSessionSlots->whereIn("id", $cartItems)->count();
                })->map(function ($session) use ($cartItems) {
                    return [
                        "id" => $session->id,
                        // convert date to
                        "start_date" => $session->start_date,
                        "end_date" => $session->end_date,
                        "slots" => $session->campSessionSlots->filter(function ($slot) use ($cartItems) {
                            return in_array($slot->id, $cartItems);
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

        dd($camps);


        $total_camps=$camps->count();
        $total_sessions=$camps->sum(function($camp){
            return $camp["sessions"]->count();
        });
        $total_slots=$camps->sum(function($camp){
            return $camp["sessions"]->sum(function($session){
                return $session["slots"]->count();
            });
        });
        $total_price=$camps->sum(function($camp){
            return $camp["price"];
        });

        $total_price*= $total_slots;





        $this->makePayment($total_price,$request->sourceId);

    }

    public function makePayment($totalPrice,$sourceId)
    {

        $amount = $totalPrice; //Is in USD currency and is in smallest denomination (cents). ($amount = 5000 == 50 Dollars)

        // convert to cents
        $amount = $amount * 100;

        // nonce reference => https://developer.squareup.com/docs/payment-form/payment-form-walkthrough
        // single-use token (nonce) generated by the client-side javascript library
        $formNonce = $sourceId;

        $location_id = env('SQUARE_LOCATION_ID'); //id of a location from Square

        // optional, default=USD
        $currency = config("app.currency"); //available currencies => https://developer.squareup.com/reference/square/objects/Currency

        // optional
        $note = 'This is my first payment to Square with this library'; //note about this charge

        // // optional
        // $reference_id = '25'; //some kind of reference id to an object or resource

        $options = [
            'amount' => $amount,
            'source_id' => $formNonce,
            'location_id' => $location_id,
            'currency' => $currency,
            'note' => $note,

        ];


        return Square::charge($options); // Simple charge



    }
}
