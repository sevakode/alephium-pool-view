<?php

namespace App\Services\Telegram;

/**
 *
 */
class TelegramQuestionMessage
{
    protected $text = "";
    protected $keyboard = ['reply_markup' => ""];
    protected $message_id = "";

    /**
     * @param mixed $text
     */
    public function __construct($text = "") {
        $this->text = $text;
    }

    /**
     * @param mixed $text
     * @return static
     */
    public static function create($text = ""): self
    {
        return new static($text);
    }

    /**
     * @param array $keyboard
     * @return $this
     */
    public function setKeyboard(array $keyboard): self
    {
        $this->keyboard = $keyboard;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplyMarkup(): string
    {
        return $this->keyboard['reply_markup'];
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }
}