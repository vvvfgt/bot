<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class mw extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mw';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $order = Order::query()->active()->get();

        dd($order);
    }
}
