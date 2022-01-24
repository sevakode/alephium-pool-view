<?php


namespace App\Http;


use Illuminate\Support\Facades\Http;

class TelegramSender
{
    const BASE_URL = "https://api.telegram.org/bot";

    function __construct () {
        $this->website = self::BASE_URL.env('TELEGRAM_TOKEN');
    }

    public function sendMessage($chatId, $message)
    {
        $params=[
            'chat_id' => $chatId,
            'text' => $message,
        ];
        return Http::post($this->website . '/sendMessage', $params)->json();
    }
    public function getUpdates($chatId): \Illuminate\Http\Client\Response
    {
        return Http::post($this->website . '/getUpdates');
    }
}
