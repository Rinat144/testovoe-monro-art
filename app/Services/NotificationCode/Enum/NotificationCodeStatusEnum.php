<?php

namespace App\Services\NotificationCode\Enum;

enum NotificationCodeStatusEnum: int
{
    case ACTIVE = 1;
    case USED = 2;
}
