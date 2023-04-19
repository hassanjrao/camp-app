<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nikolag\Square\Facades\Square;

class PaymentController extends Controller
{

    public function storeO(Request $request)
    {
        // $request->validate([
        //     'amount' => 'required|numeric',
        //     'nonce' => 'required|string',
        // ]);

        //$amount is in USD currency and is in smallest denomination (cents). ($amount = 200 == 2 Dollars)
        $amount = 1000;

        //nonce reference => https://docs.connect.squareup.com/articles/adding-payment-form
        $formNonce = $request->sourceId;

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
            'products' => $products,
            "user_id" => 1,
            "total" => 1000,
        );


        //Create and save order and apply a discount to the order
        $order['discounts'] = array($discount);
        $square = Square::setOrder($order, $location_id)->charge($options);
    }

    public function store(Request $request)
    {

        $amount = 5000; //Is in USD currency and is in smallest denomination (cents). ($amount = 5000 == 50 Dollars)

        // nonce reference => https://developer.squareup.com/docs/payment-form/payment-form-walkthrough
        // single-use token (nonce) generated by the client-side javascript library
        $formNonce = $request->sourceId;

        $location_id = env('SQUARE_LOCATION_ID'); //id of a location from Square

        // optional, default=USD
        $currency = 'USD'; //available currencies => https://developer.squareup.com/reference/square/objects/Currency

        // optional
        $note = 'This is my first payment to Square with this library'; //note about this charge

        // optional
        $reference_id = '25'; //some kind of reference id to an object or resource

        $options = [
            'amount' => $amount,
            'source_id' => $formNonce,
            'location_id' => $location_id,
            'currency' => $currency,
            'note' => $note,
            'reference_id' => $reference_id
        ];


        Square::charge($options); // Simple charge
    }
}
