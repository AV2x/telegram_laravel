<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['name', 'email', 'product', 'public', 'secret_key'];
    public $timestamps = null;

    public function scopeActive($query){
        return $query->where('public', 1);
    }

}
