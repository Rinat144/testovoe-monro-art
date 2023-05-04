<?php

namespace App\Services\Notification\Email;

use App\Services\Notification\Notification;
use Exception;

class EmailNotification implements Notification
{
    /**
     * @return void
     * @throws Exception
     */
    final public function sendMessage(): void
    {
        echo 'send message Email';
    }
}
