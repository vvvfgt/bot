<?php

namespace App\Service;

use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{
    public const URL = 'https://api.telegram.org/bot';
    public const SITE = 'https://test.ust-pc.com';

    public function sendMessage(int $chatId, string $message)
    {
        return Http::post(
            self::URL . TelegramService::botToken() . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html'
            ]
        );
    }

    public function editMessage(int $chatId, string $message, int $message_id)
    {
        return Http::post(
            self::URL . TelegramService::botToken() . '/editMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html',
                'message_id' => $message_id
            ]
        );
    }

    public function sendDocument(int $chatId, string $file, int $reply_id = null)
    {
         return Http::attach('document', Storage::disk('public')->get($file), 'text.txt')
            ->post(
                self::URL . TelegramService::botToken() . '/sendDocument', [
                    'chat_id' => $chatId,
                    'replay_to_message_id' => $reply_id
           ]);
    }

    public function sendButtons(int $chatId, string $message, $button)
    {
        return Http::post(
            self::URL . TelegramService::botToken() . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html',
                'reply_markup' => $button
            ]
        );
    }

    public function editButtons(int $chatId, string $message, $button, int $messageId)
    {
        return Http::post(
            self::URL . TelegramService::botToken() . '/editMessageText', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html',
                'reply_markup' => $button,
                'message_id' => $messageId
            ]
        );
    }

    public function confirmOrder(Order $order)
    {
        $data = [
            'id' => $order->id,
            'name' => $order->name,
            'email' => $order->email,
        ];
    }

    public function newOrder(Order $order)
    {
        $data = [
            'id' => $order->id,
            'name' => $order->name,
            'email' => $order->email,
            'total' => $order->total,
            'products' => json_decode($order->products, true),
        ];

        $reply_markup = [
            'inline_keyboard' =>
                [
                    [
                        [
                            'text' => __('order.accept'),
                            'callback_data' => '1|' . $order->secret_key,
                        ],
                        [
                            'text' => __('order.reject'),
                            'callback_data' => '0|' . $order->secret_key,
                        ],
                    ]
                ]
        ];

        $this->sendButtons(
            TelegramService::chatId(),
            (string)view('site.messages.new_order', $data),
            $reply_markup
        );
    }

    public function hookRegistration(): void
    {
       Http::get(
           self::URL . TelegramService::botToken() . '/setWebhook?url=' . self::SITE . '/webhook'
       );
    }

    public function checkWebhook(): void
    {
       Http::get(
           self::URL . TelegramService::botToken() . '/getWebhookInfo'
       );
    }
}
