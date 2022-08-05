<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function createTransaction()
        {
            $client_id = Auth::guard('clients')->user()->id;
            $delete =  Cart::where('client_id', $client_id)->delete();
            return redirect('cart')->with('sucess','payment successfully completed');
          
        }
    
        public function processTransaction(Request $request)
        {
            $client_id = Auth::guard('clients')->user()->id;

            $cart = Cart::with('product')->where('client_id', $client_id)->get();

            $grandTotal = 0;
            $product = [];
            foreach ($cart as $value) {
    
                $price = $value->product['prize'];
             
                $count = $value->count;
                $total = $price * $count;
                $grandTotal += $total;
            };
        
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
    
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $grandTotal
                        ]
                    ]
                ]
            ]);
    
            if (isset($response['id']) && $response['id'] != null) {
    
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
    
                return redirect()
                    ->route('createTransaction')
                    ->with('error', 'Something went wrong.');
    
            } else {
                return redirect()
                    ->route('createTransaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
    
        /**
         * success transaction.
         *
         * @return \Illuminate\Http\Response
         */
        public function successTransaction(Request $request)
        {
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);
    
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                return redirect()
                    ->route('createTransaction')
                    ->with('success', 'Transaction complete.');
            } else {
                return redirect()
                    ->route('createTransaction')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
    
        /**
         * cancel transaction.
         *
         * @return \Illuminate\Http\Response
         */
        public function cancelTransaction(Request $request)
        {
            return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
        }
}
