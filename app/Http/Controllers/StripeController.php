<?php

namespace App\Http\Controllers;

use App\Models\OrderDetails;
use App\Models\Orders;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session()
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));


        $total = 0;
        $cart = session('cart');
        foreach ($cart as $item)
            $total+= $item['price'] * $item['quantity'];
        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'USD',
                        'product_data' => [
                            'name' => 'Step With You Payment',
                        ],
                        'unit_amount'  => $total * 100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('session'),
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {

        $cart = session()->get('cart');

        $total = 0;
        
        foreach ($cart as $item)
            $total+= $item['price'] * $item['quantity'];
    
    // Create a new order in the 'orders' table
        $order = Orders::create([
            'customerID' => auth()->id(), // You may adjust this based on your user management
            'orderDate' => now(), // Implement your own logic for calculating the total price
            // Add any other order-related fields here
        ]);

    // Associate cart items with the order in the 'order_items' table
        foreach ($cart as $item) {
            OrderDetails::create([
                'orderID' => $order->id,
                'color' => ' ',
                'size' => 0,
                'productID' => $item['productID'],
                'quantity' => $item['quantity'],
                // You may add more fields if needed
            ]);
    }



        session()->forget('cart');
        return view('success');
        
    }
}
