<?php

namespace App\Listeners;

use App\Events\OrderStore;
use App\Service\Telegram;
use App\Service\TelegramService;


class TelegramSubscriber
{
    public function __construct(
        protected Telegram $telegram
    )
    {}

    public function orderStore($event)
    {
        $data = [
            'id' => $event->order->id,
            'name' => $event->order->name,
            'email' => $event->order->email,
            'product' => $event->order->product,
        ];

        $reply_markup = [
            'inline_keyboard' =>
                [
                    [
                        [
                            'text' => 'Принять',
                            'callback_data' => '1|' . $event->order->secret_key,
                        ],
                        [
                            'text' => 'Отклонить',
                            'callback_data' => '0|' . $event->order->secret_key,
                        ],
                    ]
                ]
        ];

        $this->telegram->sendButtons(
            TelegramService::chatId(),
            (string)view('site.messages.new_order', $data),
            $reply_markup
        );
   }


    public function subscribe($events)
    {
        $events->listen(
            OrderStore::class, [
                TelegramSubscriber::class, 'orderStore'
            ]
        );
    }
}
