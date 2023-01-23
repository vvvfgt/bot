<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{
    public const URL = 'https://api.telegram.org/bot';

    public function __construct(
        private Http $http
    ) {}

    public function sendMessage(int $chatId, string $message): void
    {
        $this->http::post(
            self::URL . \App\Service\TelegramService::botToken() . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html'
            ]
        );
    }

    public function sendDocument(int $chatId, string $file)
    {
         return $this->http::attach('document', Storage::disk('public')->get($file), 'text.txt')
            ->post(
                self::URL . \App\Service\TelegramService::botToken() . '/sendDocument', [
                    'chat_id' => $chatId,
           ]);
    }
}
