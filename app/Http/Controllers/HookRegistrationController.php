<?php

namespace App\Http\Controllers;

use App\Service\Telegram;
use Illuminate\Http\Request;

class HookRegistrationController extends Controller
{
    public function __invoke(Request $request)
    {
        (new Telegram())->hookRegistration();
    }
}
