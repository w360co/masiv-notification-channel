<?php

namespace W360\Masiv\Notifications\Tests\App\Notifications;

use Illuminate\Notifications\Notification as BaseNotification;
use W360\Masiv\Notifications\Messages\MasivMessage;

class TestNotification extends BaseNotification
{

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['masiv'];
    }


    public function toMasiv($notifiable)
    {
        return (new MasivMessage)->content( 'Test SMS Content');
    }

}