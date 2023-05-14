<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class WebHookController extends Controller
{
    public function __invoke(Request $request)
    {
        $response = explode('|', $request->input('callback_query')['data']);
        $order = Order::query()->firstWhere('secret_key', $response[1]);

        if ($order) {
            if ($response[0]) {
                $order->update([
                    'public' => 1,
                ]);
            } else {
                $order->delete();
            }
        }
    }
}
