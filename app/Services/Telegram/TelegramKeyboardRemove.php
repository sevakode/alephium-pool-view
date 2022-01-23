<?php

namespace App\Services\Telegram;

use Illuminate\Support\Collection;

class TelegramKeyboardRemove
{

    protected $selective = null;
    protected $removeKeyboard = true;

    /**
     * @return TelegramKeyboardRemove
     */
    public static function create($removeKeyboard = true): TelegramKeyboardRemove
    {
        return new self($removeKeyboard);
    }

    /**
     * Keyboard constructor.
     */
    public function __construct($removeKeyboard = true)
    {
        $this->removeKeyboard = $removeKeyboard;
    }

    /**
     * @param $selective
     * @return $this
     */
    public function selective($selective)
    {
        $this->selective = $selective;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'reply_markup' => json_encode(Collection::make([
                'remove_keyboard' => $this->removeKeyboard,
                'selective' => $this->selective
            ])->filter()),
        ];
    }
}