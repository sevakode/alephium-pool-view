<?php

namespace App\Services;

class TelegramService
{
    /**
     * @var string
     */
    private $serviceUrl;
    /**
     * @var string
     */
    private $url = null;
    private $token = null;
    /**
     * @var void
     */
    private $response;

    public function __construct($token, $url = "https://api.telegram.org/bot")
    {
        $this->setToken($token);
        $this->setUrl($url);
    }

    public static function make()
    {
        return new self("1774134242:AAH6PXXnNg-M7Hfu7TK5eipm6ajOoIwrjdw");
    }

    public function send($chatId, $messageText)
    {
        //urlencode(request())
        $ch = curl_init();

        $url = $this->getFullUrl('sendMessage')."?chat_id=$chatId";
        $url = $url . "&text=" . $messageText;
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function sendRequestLog($chatId): self
    {
        $this->response = $this->send($chatId, urlencode(request()));

        return $this;
    }

    public function response()
    {
        return $this->response;
    }

    public function getFullUrl(string $method): string
    {
        return $this->getUrl() . $this->getToken() . "/$method";
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}
