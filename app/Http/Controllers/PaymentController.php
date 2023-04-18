<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function store(Request $request)
    {
        dd($request->all());

        $square_client = new SquareClient([
            'accessToken' => $access_token,
            'environment' => getenv('ENVIRONMENT')
        ]);

        $payments_api = $square_client->getPaymentsApi();

        $money = new Money();
        $money->setAmount(100);
        // Set currency to the currency for the location
        $money->setCurrency($location_info->getCurrency());

        // Every payment you process with the SDK must have a unique idempotency key.
        // If you're unsure whether a particular payment succeeded, you can reattempt
        // it with the same idempotency key without worrying about double charging
        // the buyer.
        $create_payment_request = new CreatePaymentRequest($token, Uuid::uuid4(), $money);

        $response = $payments_api->createPayment($create_payment_request);

        if ($response->isSuccess()) {
            echo json_encode($response->getResult());
        } else {
            echo json_encode($response->getErrors());
        }
    }
}
