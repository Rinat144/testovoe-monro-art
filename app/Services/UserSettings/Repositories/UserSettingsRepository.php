<?php

namespace App\Services\UserSettings\Repositories;

use App\Models\User;
use App\Services\UserSettings\DTOs\ChangeDateOfBirthDto;

class UserSettingsRepository
{
    /**
     * @param ChangeDateOfBirthDto $changeDateOfBirthDto
     * @return void
     */
    final public function changeDateOfBirth(ChangeDateOfBirthDto $changeDateOfBirthDto): void
    {
        User::query()
            ->where('id', '=', $changeDateOfBirthDto->userId)
            ->update(['date_of_birth' => $changeDateOfBirthDto->dateOfBirth]);
    }
}
