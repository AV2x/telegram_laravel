<?php

namespace App\Http\Controllers;


use App\Events\OrderStore;
use App\Helpers\Telegram;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function store(Order  $order, Request  $request){
        $key = base64_encode(md5(uniqid()));
        $order = $order->create([
            'name' => $request->input('name'),
            'email' => $request->input('email2'),
            'product' => $request->input('product'),
            'secret_key' => $key,
        ]);

        event(new OrderStore($order));

        return response()->redirectTo('/');
    }
}
