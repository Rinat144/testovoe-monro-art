<?php

namespace App\Services\UserSettings\DTOs;

class ChangeDateOfBirthDto
{
    public function __construct(
        public int $code,
        public int $userId,
        public string $dateOfBirth,
    ) {
    }
}
