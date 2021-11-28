<?php

namespace App\Http\Controllers;


use App\Helpers\Telegram;
use App\Models\Order;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function index(Request  $request, Telegram  $telegram){
        Log::debug($request->all());
        //Post::where('public_message_id', $request->input('message')['forward_from_message_id'])->update(['chat_message_id' => $request->input('message')['message_id']]);

//        $public = explode('|', $request->input('callback_query')['data'])[0];
//        $secret_key = explode('|', $request->input('callback_query')['data'])[1];
//        $order = Order::where('secret_key', $secret_key)->first();
//        if($public == 1){
//            $reply_markup = [
//                'inline_keyboard' =>
//                    [
//                        [
//                            [
//                                'text' => '✅Принять',
//                                'callback_data' => '1|'.$order->secret_key,
//                            ],
//                            [
//                                'text' => 'Отклонить',
//                                'callback_data' => '0|'.$order->secret_key,
//                            ],
//                        ]
//                    ]
//            ];
//        }
//        else{
//            $reply_markup = [
//                'inline_keyboard' =>
//                    [
//                        [
//                            [
//                                'text' => 'Принять',
//                                'callback_data' => '1|'.$order->secret_key,
//                            ],
//                            [
//                                'text' => '✅Отклонить',
//                                'callback_data' => '0|'.$order->secret_key,
//                            ],
//                        ]
//                    ]
//            ];
//        }
//
//        $data = [
//            'id' => $order->id,
//            'name' => $order->name,
//            'email' => $order->email,
//            'product' => $order->product,
//        ];
//        $order->public = $public;
//        $order->save();
//        $telegram->editButtons(env('REPORT_TELEGRAM_ID'), (string)view('site.messages.new_order', $data), $reply_markup, $request->input('callback_query')['message']['message_id']);
//
    }

}
