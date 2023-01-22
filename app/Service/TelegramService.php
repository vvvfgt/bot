<?php


namespace App\Service;


class TelegramService
{
    public static function botToken(): string
    {
       return config('telegram.token');
    }

    public static function chatId(): int
    {
        return 1742662462;
    }
}
