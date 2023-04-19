<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nikolag\Square\Facades\Square;

class PaymentController extends Controller
{

    public function store(Request $request)
    {
        // $request->validate([
        //     'amount' => 'required|numeric',
        //     'nonce' => 'required|string',
        // ]);

        //$amount is in USD currency and is in smallest denomination (cents). ($amount = 200 == 2 Dollars)
        $amount = 1000;

        //nonce reference => https://docs.connect.squareup.com/articles/adding-payment-form
        $formNonce = $request->token;

        //$location_id is id of a location from Square
        $location_id = env('SQUARE_LOCATION_ID');

        //note about this order
        $note = 'My first order made with Square';

        //some kind of reference id to an object or resource
        $reference_id = 'client_1_bought_file.pdf';

        $options = array(
            'amount' => $amount,
            'source_id' => $formNonce,
            'location_id' => $location_id,
            'note' => $note,
            'reference_id' => $reference_id
        );

        $products = array(
            [
                'name' => 'Shirt',
                'variation_name' => 'Large white',
                'note' => 'This note can have maximum of 50 characters.',
                'price' => 440.99,
                'quantity' => 2,
                'reference_id' => '5' //An optional ID to associate the product with an entity ID in your own table
            ],
            [
                'name' => 'Shirt',
                'variation_name' => 'Mid-size yellow',
                'note' => 'This note can have maximum of 50 characters.',
                'quantity' => 1,
                'price' => 118.02
            ],
        );

        $discount = array(
            'name' => 'Sale Mania -5 USD',
            'amount' => 500 //It is in the smallest denomination of currency provided (if currency = USD then amount = 500 cents == 5 USD)
        );

        $order = array(
            'products' => $products
        );


        //Create and save order and apply a discount to the order
        $order['discounts'] = array($discount);
        $square = Square::setOrder($order, $location_id)->save();
    }
}
