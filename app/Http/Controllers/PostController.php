<?php

namespace App\Http\Controllers;


use App\Helpers\Telegram;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Post  $post, Request $request, Telegram  $telegram){
       $response = $telegram->replyMessage('-1001677082974', 'Привет пост', 9);
//       $response = json_decode($response->body());
//        $post->create([
//            'text' => $request->input('text'),
//            'public_message_id' => $response->result->message_id,
//        ]);
    }
}
