<?php

namespace App\Services\Notification\Sms;

use App\Services\Notification\Notification;
use Exception;

class SmsNotification implements Notification
{
    /**
     * @return void
     * @throws Exception
     */
    final public function sendMessage(): void
    {
        echo 'send message Sms';
    }
}
