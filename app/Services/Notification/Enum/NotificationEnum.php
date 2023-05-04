<?php

namespace App\Services\Notification\Enum;

enum NotificationEnum: int
{
    case EMAIL_NOTIFICATION = 1;
    case SMS_NOTIFICATION = 2;
    case TELEGRAM_NOTIFICATION = 3;
}
