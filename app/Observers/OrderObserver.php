<?php

namespace App\Observers;

use App\Models\Order;
use App\Service\Telegram;

class OrderObserver
{
    public function created(Order $order)
    {
       (new Telegram())->newOrder($order);
    }

    public function deleting(Order $order)
    {
       $order->orderProducts()->delete();
    }
}
