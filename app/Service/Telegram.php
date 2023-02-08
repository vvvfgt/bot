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

    public function sendMessage(int $chatId, string $message)
    {
        return $this->http::post(
            self::URL . \App\Service\TelegramService::botToken() . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html'
            ]
        );
    }

    public function editMessage(int $chatId, string $message, int $message_id)
    {
        return $this->http::post(
            self::URL . \App\Service\TelegramService::botToken() . '/editMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html',
                'message_id' => $message_id
            ]
        );
    }

    public function sendDocument(int $chatId, string $file, int $reply_id = null)
    {
         return $this->http::attach('document', Storage::disk('public')->get($file), 'text.txt')
            ->post(
                self::URL . \App\Service\TelegramService::botToken() . '/sendDocument', [
                    'chat_id' => $chatId,
                    'replay_to_message_id' => $reply_id
           ]);
    }

    public function sendButtons(int $chatId, string $message, $button)
    {
        return $this->http::post(
            self::URL . \App\Service\TelegramService::botToken() . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html',
                'reply_markup' => $button
            ]
        );
    }

    public function editButtons(int $chatId, string $message, $button, int $messageId)
    {
        return $this->http::post(
            self::URL . \App\Service\TelegramService::botToken() . '/editMessageText', [
                'chat_id' => $chatId,
                'text' => $message,
                'parse_mode' => 'html',
                'reply_markup' => $button,
                'message_id' => $messageId
            ]
        );
    }
}
