<?php

namespace App\Events;


use App\Models\Order;

class OrderStore
{

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

}
