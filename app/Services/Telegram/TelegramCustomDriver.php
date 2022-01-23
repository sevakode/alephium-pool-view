<?php

namespace App\Services\Telegram;

use App\Services\TelegramService;
use BotMan\BotMan\Messages\Attachments\Audio;
use BotMan\BotMan\Messages\Attachments\Contact;
use BotMan\BotMan\Messages\Attachments\File;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Attachments\Location;
use BotMan\BotMan\Messages\Attachments\Video;
use BotMan\BotMan\Messages\Incoming\IncomingMessage;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\Drivers\Telegram\TelegramDriver;
use Illuminate\Support\Collection;

class TelegramCustomDriver extends TelegramDriver
{
    /**
     * @param string|Question|IncomingMessage $message
     * @param IncomingMessage $matchingMessage
     * @param array $additionalParameters
     */
    public function buildServicePayload($message, $matchingMessage, $additionalParameters = [])
    {
        $this->endpoint = 'sendMessage';

        $recipient = $matchingMessage->getRecipient() === '' ? $matchingMessage->getSender() : $matchingMessage->getRecipient();
        $defaultAdditionalParameters = $this->config->get('default_additional_parameters', []);
        $parameters = array_merge_recursive([
            'chat_id' => $recipient,
        ], $additionalParameters + $defaultAdditionalParameters);

        /*
         * If we send a Question with buttons, ignore
         * the text and append the question.
         */
        if ($message instanceof Question) {
            $parameters['text'] = $message->getText();
            $this->question($message, $parameters, $additionalParameters);
        }  elseif($message instanceof TelegramQuestionPhoto) {
            $this->image($message, $parameters);
            $this->question($message, $parameters, $additionalParameters);
        } elseif ($message instanceof OutgoingMessage) {
            if ($message->getAttachment() !== null) {
                $attachment = $message->getAttachment();
                $parameters['caption'] = $message->getText();
                if ($attachment instanceof Image) {
                    if (strtolower(pathinfo($attachment->getUrl(), PATHINFO_EXTENSION)) === 'gif') {
                        $this->endpoint = 'sendDocument';
                        $parameters['document'] = $attachment->getUrl();
                    } else {
                        $this->endpoint = 'sendPhoto';
                        $parameters['photo'] = $attachment->getUrl();
                    }
                    // If has a title, overwrite the caption
                    if ($attachment->getTitle() !== null) {
                        $parameters['caption'] = $attachment->getTitle();
                    }
                } elseif ($attachment instanceof Video) {
                    $this->endpoint = 'sendVideo';
                    $parameters['video'] = $attachment->getUrl();
                } elseif ($attachment instanceof Audio) {
                    $this->endpoint = 'sendAudio';
                    $parameters['audio'] = $attachment->getUrl();
                } elseif ($attachment instanceof File) {
                    $this->endpoint = 'sendDocument';
                    $parameters['document'] = $attachment->getUrl();
                } elseif ($attachment instanceof Location) {
                    $this->endpoint = 'sendLocation';
                    $parameters['latitude'] = $attachment->getLatitude();
                    $parameters['longitude'] = $attachment->getLongitude();
                    if (isset($parameters['title'], $parameters['address'])) {
                        $this->endpoint = 'sendVenue';
                    }
                } elseif ($attachment instanceof Contact) {
                    $this->endpoint = 'sendContact';
                    $parameters['phone_number'] = $attachment->getPhoneNumber();
                    $parameters['first_name'] = $attachment->getFirstName();
                    $parameters['last_name'] = $attachment->getLastName();
                    $parameters['user_id'] = $attachment->getUserId();
                    if (null !== $attachment->getVcard()) {
                        $parameters['vcard'] = $attachment->getVcard();
                    }
                }
            } else {
                $parameters['text'] = $message->getText();
            }
        } elseif($message instanceof TelegramQuestionEditMessage) {

            // For "editMessage"
            $parameters['message_id'] = $message->getMessageId();
            $parameters['text'] = $message->getText();
            $this->endpoint = 'editMessageText';
            $parameters['reply_markup'] = $message->getReplyMarkup();

            if(!empty($message->getReplyMarkup())){
                $this->endpoint = 'editMessageReplyMarkup';
            }
        } elseif ($message instanceof TelegramQuestionMessage) {
            $parameters['text'] = $message->getText();
            $parameters['reply_markup'] = $message->getReplyMarkup();
        } else {
            $parameters['text'] = $message;
        }

        return $parameters;
    }

    private function question($message, &$parameters, $additionalParameters)
    {
        if(isset($additionalParameters['reply_markup'])) {
            $parameters['reply_markup'] = $additionalParameters['reply_markup'];
        } else {
            $parameters['reply_markup'] = json_encode([
                'inline_keyboard' => $this->convertQuestion($message)
            ], true);
        }
    }

    private function image($message, &$parameters)
    {
        $attachment = $message->getAttachment();
        $parameters['caption'] = $message->getText();
        TelegramService::make()->send('401080996', $attachment->getUrl());
        if ($attachment instanceof Image) {
            if($message->getMessageId()) {
                $this->endpoint = 'editMessageMedia';
                $parameters['message_id'] = $message->getMessageId();
                $parameters['media'] = [
                    'type' => 'photo',
                    'media' => $attachment->getUrl()
                ];
            } elseif (strtolower(pathinfo($attachment->getUrl(), PATHINFO_EXTENSION)) === 'gif') {
                $this->endpoint = 'sendDocument';
                $parameters['document'] = $attachment->getUrl();
            } else {
                $this->endpoint = 'sendPhoto';
                $parameters['photo'] = $attachment->getUrl();
            }
            // If has a title, overwrite the caption
            if ($attachment->getTitle() !== null) {
                $parameters['caption'] = $attachment->getTitle();
            }
        }
    }

    /**
     * Convert a Question object into a valid
     * quick reply response object.
     *
     * @param $question
     * @return array
     */
    private function convertQuestion($question)
    {
        $replies = Collection::make($question->getButtons())->map(function ($button) {
            return [
                array_merge([
                    'text' => (string) $button['text'],
                    'callback_data' => (string) $button['value'],
                ], $button['additional']),
            ];
        });

        return $replies->toArray();
    }
}