<?php

namespace App\Services\NotificationCode\Repositories;

use App\Models\NotificationCode;
use App\Services\NotificationCode\Enum\NotificationCodeStatusEnum;
use App\Services\UserSettings\DTOs\ChangeDateOfBirthDto;
use Illuminate\Database\Eloquent\Model;

class NotificationCodeRepository
{
    /**
     * @param int $userId
     * @param int $code
     * @return void
     */
    final public function saveCode(int $userId, int $code): void
    {
        NotificationCode::query()
            ->insert([
                'user_id' => $userId,
                'code' => $code,
                'status' => NotificationCodeStatusEnum::ACTIVE,
            ]);
    }

    /**
     * @param ChangeDateOfBirthDto $changeDateOfBirthDto
     * @return ?Model
     */
    final public function validateCode(ChangeDateOfBirthDto $changeDateOfBirthDto): ?NotificationCode
    {
        return NotificationCode::query()
            ->where('user_id', '=', $changeDateOfBirthDto->userId)
            ->where('code', '=', $changeDateOfBirthDto->code)
            ->where('status', '=', NotificationCodeStatusEnum::ACTIVE)
            ->latest('created_at')
            ->first();
    }

    /**
     * @param NotificationCode $notificationCode
     * @return void
     */
    final public function updateStatusCode(NotificationCode $notificationCode): void
    {
        $notificationCode->update(['status' => NotificationCodeStatusEnum::USED]);
    }
}
