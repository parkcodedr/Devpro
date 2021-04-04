<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    //

    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => request()->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "NGN",
            'redirect_url' => route('callback'),
            'customer' => [
                'email' => request()->email,
                "phonenumber" => request()->phone,
                "name" => request()->name
            ],

            "customizations" => [
                "title" => "Devpro " . request()->description . " Plan",
                "description" => "Devpro subscription"
            ]
        ];

        $payment = Flutterwave::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {

        $transactionID = Flutterwave::getTransactionIDFromCallback();
        $data = Flutterwave::verifyTransaction($transactionID);

        //dd($data['data']);
        if ($data['data']['status'] == "successful") {
            $amount = $data['data']['amount'];
            $plan = Plan::where('amount', $amount)->first();
            $customer =  $data['data']['customer'];
            Subscription::create([
                'user_email' => $customer['email'],
                'plan' => $plan->name,
                'status' => 'active'
            ]);
            return redirect()->to('success');
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the $data['data']['status'] is 'successful'
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
    function success()
    {
        return view('success');
    }
}
