<?php

namespace App\Services\Notification\DTOs;

class SelectTypeNotificationDto
{
    /**
     * @param int $type
     * @param int $userId
     */
    public function __construct(
        public int $type,
        public int $userId,
    ) {
    }
}
