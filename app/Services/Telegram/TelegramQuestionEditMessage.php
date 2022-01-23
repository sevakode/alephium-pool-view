<?php

namespace App\Services\Telegram;

class TelegramQuestionEditMessage extends TelegramQuestionMessage
{
    /**
     * @param $message_id
     * @return $this
     */
    public function setMessageId($message_id): TelegramQuestionEditMessage
    {
        $this->message_id = $message_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessageId(): string
    {
        return $this->message_id;
    }
}