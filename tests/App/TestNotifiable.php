<?php

namespace W360\Masiv\Notifications\Tests\App;

use Illuminate\Notifications\Notifiable;

class TestNotifiable
{
    use Notifiable;

    public function getKey()
    {
        return 1;
    }
}