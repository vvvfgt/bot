<?php

namespace App\Service;

use App\Models\Order;
use Illuminate\Support\Collection;

class OrderService
{
    public function transformOrders(Collection $orders): Collection
    {
        return $orders->transform(function (Order $order) {
            $order->total = $order->total - 10;
            return $order;
        });
    }

}
