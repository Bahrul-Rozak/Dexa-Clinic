<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramService
{
    protected $botToken;
    protected $chatId;

    public function __construct()
    {
        $this->botToken = env('TELEGRAM_BOT_TOKEN');   // ambil dari .env
        $this->chatId = env('TELEGRAM_CHAT_ID');       // chat ID tim atau channel lo
    }

    public function sendMessage($message)
    {
        $url = "https://api.telegram.org/bot{$this->botToken}/sendMessage";

        Log::info("Sending Telegram message to chat_id: {$this->chatId}");

        $response = Http::post($url, [
            'chat_id' => $this->chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
        ]);

        \Log::info('Telegram API response: ' . $response->body());

        return $response->successful();
    }
}
