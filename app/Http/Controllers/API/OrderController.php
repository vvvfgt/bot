<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\OrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    public function __invoke(OrderRequest $request)
    {
        $data = $request->validated();

        $order = Order::create([
            'products' => json_encode($data['products']),
            'name' => $data['name'],
            'email' => $data['email'],
            'total' => $data['total_price'],
            'secret_key' =>  base64_encode(md5(uniqid())),
        ]);

        foreach ($data['products'] as $product) {
            $order->orderProducts()->create([
               'product_id' => $product['id'],
               'title' => $product['title'],
               'count' => $product['qty'],
               'price' => $product['price']
            ]);
        }

        return $data;
    }
}
