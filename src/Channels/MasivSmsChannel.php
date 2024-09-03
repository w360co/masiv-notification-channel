<?php

namespace W360\Masiv\Notifications\Channels;

use W360\Masiv\Notifications\Messages\MasivMessage;
use Illuminate\Notifications\Notification;
use W360\Masiv\Client as MasivClient;

class MasivSmsChannel
{
    /**
     * @var MasivClient
     */
    protected $masiv;


    /**
     * @param MasivClient $masiv
     */
    public function __construct(MasivClient $masiv)
    {
        $this->masiv = $masiv;
    }

    /**
     * @param $notifiable
     * @param Notification $notification
     * @return \Psr\Http\Message\ResponseInterface|void
     */
    public function send($notifiable, Notification $notification)
    {
        if (! $to = $notifiable->routeNotificationFor('masiv', $notification)) {
            return;
        }

        $message = $notification->toMasiv($notifiable);

        if (is_string($message)) {
            $message = new MasivMessage($message);
        }

        return ($message->client ?? $this->masiv)->sendMessage(
            $to,
            trim($message->content)
        );
    }
}
