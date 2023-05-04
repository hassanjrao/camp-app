<?php

namespace App\Http\Livewire\Cart;

use App\Models\Camp;
use App\Models\CampSessionSlot;
use App\Models\Discount;
use Livewire\Component;

class Carts extends Component
{

    public $camps;

    public $checkoutCalculations=[
        "total_camps"=>0,
        "total_sessions"=>0,
        "total_slots"=>0,
        "total_price"=>0,
    ];

    public $enteredDiscountCode;
    public $discountApplied=false;

    public function applyDiscount(){
        $this->validate([
            "enteredDiscountCode"=>"required|exists:discounts,code"
        ],[
            "enteredDiscountCode.required"=>"Please enter a discount code",
            "enteredDiscountCode.exists"=>"The discount code you entered is invalid"
        ]);

        $discount=Discount::where("code",$this->enteredDiscountCode)->first();

        // check if discount is active
        if(!$discount->is_active){
            $this->addError("enteredDiscountCode","The discount code you entered is not active");
            return;
        }

        // check if discount is expired
        if($discount->is_expired){
            $this->addError("enteredDiscountCode","The discount code you entered is expired");
            return;
        }

        // apply discount

        $this->discountApplied=true;

        $this->checkoutCalculations["total_price"]=($this->checkoutCalculations["total_price"]*$discount->discount_percentage)/100;



    }



    public function removeFromCart($slot_id)
    {

        // remove the slot_id from the session
        $cartItems = session()->get("cart.slots");

        // remove slot_id form cartItems array
        $cartItems = array_diff($cartItems, [$slot_id]);
        // update session
        session()->put("cart.slots", $cartItems);

        $this->getCampItems();
    }


    public function getCampItems(){


        $cartItems = session()->get("cart.slots");

        if(!$cartItems){
            $this->camps=[];
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
                        "name" => $session->name,
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

        $this->camps = $camps;

        $this->checkoutCalculations["total_camps"]=$camps->count();
        $this->checkoutCalculations["total_sessions"]=$camps->sum(function($camp){
            return $camp["sessions"]->count();
        });
        $this->checkoutCalculations["total_slots"]=$camps->sum(function($camp){
            return $camp["sessions"]->sum(function($session){
                return $session["slots"]->count();
            });
        });
        $this->checkoutCalculations["total_price"]=$camps->sum(function($camp){
            return $camp["price"];
        });

        $this->checkoutCalculations["total_price"]*= $this->checkoutCalculations["total_slots"];



    }




    public function mount()
    {
        $this->getCampItems();
    }


    public function render()
    {
        return view('livewire.cart.carts');
    }
}
