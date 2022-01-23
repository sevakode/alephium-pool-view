<?php

namespace App\Services;

class NodeService
{

    /**
     * @var string
     */
    private $url = null;
    private $token = null;


    public function __construct($token, $url = "http://10.101.4.43:12973")
    {
        $this->setToken($token);
        $this->setUrl($url);
    }

    public static function make()
    {
        return new self(env('NODE_TOKEN'));
    }

    public function balance($address)
    {
        $ch = curl_init();

        $url = $this->getFullUrl('addresses')."/$address/balance";
        $optArray = array(
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY: '.$this->getToken(),
                'Content-Type: application/json'
            ),
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }



    public function getFullUrl(string $method): string
    {
        return $this->getUrl() . "/$method";
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
