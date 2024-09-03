<?php

namespace W360\Masiv\Notifications\Tests\Feature;


use Illuminate\Support\Facades\Notification;
use W360\Masiv\Notifications\Tests\App\Notifications\TestNotification;
use W360\Masiv\Notifications\Tests\App\TestNotifiable;
use W360\Masiv\Notifications\Tests\TestCase;


class MasivSmsChannelTest extends TestCase
{

    /**
     * @return void
     */
    public function testCanSendSmsViaMasiv()
    {
        $user = new TestNotifiable();

        Notification::fake(); // Indicamos a Laravel que falsifique las notificaciones

        $user->notify(new TestNotification()); // Notificar al usuario

        // Assert
        Notification::assertSentTo(
            $user,
            TestNotification::class,
            function ($notification, $channels) {

                // Verifica si la notificación se envía a través del canal 'mail'
                return in_array('masiv', $channels);
            }
        );
    }
}