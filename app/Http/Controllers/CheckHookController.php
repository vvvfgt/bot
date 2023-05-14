<?php

namespace App\Http\Controllers;

use App\Service\Telegram;
use Illuminate\Http\Request;

class CheckHookController extends Controller
{
    public function __invoke(Request $request)
    {
        (new Telegram())->checkWebhook();
    }
}
