<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['text', 'public_message_id', 'chat_message_id'];
    public $timestamps = null;
}
