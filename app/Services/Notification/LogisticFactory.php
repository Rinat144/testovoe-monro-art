<?php

namespace App\Services\Notification;

use App\Services\Notification\Email\EmailNotification;
use App\Services\Notification\Enum\NotificationEnum;
use App\Services\Notification\Sms\SmsNotification;
use App\Services\Notification\Telegram\TelegramNotification;

class LogisticFactory
{
    /**
     * @param int $type
     * @return Notification
     */
    public static function getFactory(int $type): Notification
    {
        return match ($type) {
            NotificationEnum::EMAIL_NOTIFICATION->value => new EmailNotification(),
            NotificationEnum::SMS_NOTIFICATION->value => new SmsNotification(),
            NotificationEnum::TELEGRAM_NOTIFICATION->value => new TelegramNotification()
        };
    }
}
