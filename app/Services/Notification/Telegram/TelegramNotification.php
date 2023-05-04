<?php

namespace App\Services\Notification\Telegram;

use App\Services\Notification\Notification;
use Exception;

class TelegramNotification implements Notification
{
    /**
     * @return void
     * @throws Exception
     */
    final public function sendMessage(): void
    {
        echo 'send message Telegram';
    }
}
