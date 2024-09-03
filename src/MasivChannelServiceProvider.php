<?php

namespace W360\Masiv\Notifications;

use Illuminate\Support\Facades\Notification;
use W360\Masiv\Client;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Notifications\NotificationServiceProvider as BaseNotificationServiceProvider;
use W360\Masiv\Notifications\Channels\MasivSmsChannel;

class MasivChannelServiceProvider extends BaseNotificationServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MasivSmsChannel::class, function ($app) {
            return new MasivSmsChannel(
                $app->make(Client::class),
            );
        });

        Notification::resolved(function (ChannelManager $service) {
            $service->extend('masiv', function ($app) {
                return new Channels\MasivSmsChannel(
                    $this->app->make(Client::class)
                );
            });
        });
    }
}
