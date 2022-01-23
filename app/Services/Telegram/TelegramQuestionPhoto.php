<?php

namespace App\Services\Telegram;

use BotMan\BotMan\Interfaces\QuestionActionInterface;
use BotMan\BotMan\Interfaces\WebAccess;
use BotMan\BotMan\Messages\Attachments\Attachment;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use JsonSerializable;

class TelegramQuestionPhoto implements JsonSerializable, WebAccess
{
    /** @var array */
    protected $actions;

    /** @var string */
    protected $text;

    /** @var string */
    protected $callback_id;

    /** @var string */
    protected $fallback;

    /** @var Attachment */
    protected $attachment;

    private $message_id = null;

    /**
     * IncomingMessage constructor.
     * @param string $text
     * @param Attachment|null $attachment
     */
    public function __construct($text, Attachment $attachment = null)
    {
        $this->text = $text;
        $this->actions = [];
        $this->attachment = $attachment;
    }

    /**
     * @param $message_id
     * @return $this
     */
    public function setMessageId($message_id): TelegramQuestionPhoto
    {
        $this->message_id = $message_id;
        return $this;
    }

    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * Set the question fallback value.
     *
     * @param string $fallback
     * @return $this
     */
    public function fallback($fallback)
    {
        $this->fallback = $fallback;

        return $this;
    }

    /**
     * Set the callback id.
     *
     * @param string $callback_id
     * @return $this
     */
    public function callbackId($callback_id)
    {
        $this->callback_id = $callback_id;

        return $this;
    }

    public function addAction(QuestionActionInterface $action)
    {
        $this->actions[] = $action->toArray();

        return $this;
    }

    /**
     * @param Button $button
     * @return $this
     */
    public function addButton(Button $button)
    {
        $this->actions[] = $button->toArray();

        return $this;
    }

    /**
     * @param array $buttons
     * @return $this
     */
    public function addButtons(array $buttons)
    {
        foreach ($buttons as $button) {
            $this->actions[] = $button->toArray();
        }

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'text' => $this->text,
            'fallback' => $this->fallback,
            'callback_id' => $this->callback_id,
            'actions' => $this->actions,
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function getButtons()
    {
        return $this->actions;
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get the instance as a web accessible array.
     * This will be used within the WebDriver.
     *
     * @return array
     */
    public function toWebDriver()
    {
        return [
            'type' => (count($this->actions) > 0) ? 'actions' : 'text',
            'text' => $this->text,
            'fallback' => $this->fallback,
            'callback_id' => $this->callback_id,
            'actions' => $this->actions,
        ];
    }

    /**
     * @param string $text
     * @param Attachment|null $attachment
     * @return static
     */
    public static function create($text, Attachment $attachment = null): self
    {
        return new static($text, $attachment);
    }

    /**
     * @param string $text
     * @return $this
     */
    public function text(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @param Attachment $attachment
     * @return $this
     */
    public function withAttachment(Attachment $attachment): self
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * @return Attachment
     */
    public function getAttachment(): ?Attachment
    {
        return $this->attachment;
    }
}