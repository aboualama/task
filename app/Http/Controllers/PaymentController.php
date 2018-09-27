<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use App\order;
use App\product;
use App\orderproduct;
use Cart;

//Paymen Processing

class PaymentController extends Controller
{
    private $apiContext;
    private $secret;
    private $clientId;

    public function __construct() {
        if (config('paypal.settings.mode') == 'live') {
            $this->clientId = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->clientId = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }

        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->clientId, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function payWithPaypal (Request $request) {

        // Insert into orders table
        $order = order::create([
            'user_id'       => auth()->user()->id,
            'email'         => $request->email,
            'name'          => $request->name,
            'address'       => $request->address,
            'city'          => $request->city,
            'country'       => $request->country,
            'postalcode'    => $request->postalcode,
            'phone'         => $request->phone, 
            'total'         => $request->total,
            'error'         => $request->error,
        ]);
        // Insert into order_product table
        foreach (Cart::content() as $item) {
            orderproduct::create([
                'order_id'   => $order->id,
                'product_id' => $item->id,
                'quantity'   => $item->qty,
            ]);
        }



        $price = $request->input('total');
        $name = $request->input('item_name');

        //Set Payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        //Item(s)
        $item = new Item();
        $item->setName($name)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setDescription("this is item description")
            ->setPrice($price);

        //ItemList
        $itemList = new ItemList();
        $itemList->setItems([$item]);

        //Ammount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($price);
        
        //Transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Buying something from my site");

        //Redirect urls
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl('http://paypal.local/status')
            ->setCancelUrl('http://paypal.local/canceled');

        //Payment
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->apiContext);
        }catch(\PayPal\Exception\PPConnectionException $ex) {
            die($ex);
        }

        $paymentLink = $payment->getApprovalLink();

        return redirect($paymentLink);
    }

    public function status(Request $request) {
        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            die('Payment Failed');
        }

        $paymentId = $request->get('paymentId');
        $payment = Payment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {
            die('Thank you. Got your money bithc!!');
        }

        echo 'Payment Failed again';
        die($result);
    }
    
    public function canceled() {
        return 'Payment Canceled. No Worries';
    }
}
