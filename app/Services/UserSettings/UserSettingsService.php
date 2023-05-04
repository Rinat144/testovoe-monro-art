<?php

namespace App\Services\UserSettings;

use App\Services\NotificationCode\Repositories\NotificationCodeRepository;
use App\Services\UserSettings\DTOs\ChangeDateOfBirthDto;
use App\Services\UserSettings\Enum\ExceptionEnum;
use App\Services\UserSettings\Exception\UserSettingsException;
use App\Services\UserSettings\Repositories\UserSettingsRepository;
use Illuminate\Support\Facades\DB;

class UserSettingsService
{
    /**
     * @param UserSettingsRepository $userSettingsRepository
     * @param NotificationCodeRepository $notificationRepository
     */
    public function __construct(
        public UserSettingsRepository $userSettingsRepository,
        public NotificationCodeRepository $notificationRepository,
    ) {
    }

    /**
     * @param ChangeDateOfBirthDto $changeDateOfBirthDto
     * @return void
     * @throws UserSettingsException
     */
    final public function changeDateOfBirth(ChangeDateOfBirthDto $changeDateOfBirthDto): void
    {
        $notificationCode = $this->notificationRepository->validateCode($changeDateOfBirthDto);

        if (!$notificationCode)
        {
            throw new UserSettingsException(ExceptionEnum::WRONG_CODE->value);
        }

        DB::transaction(function () use ($changeDateOfBirthDto, $notificationCode) {
            $this->userSettingsRepository->changeDateOfBirth($changeDateOfBirthDto);
            $this->notificationRepository->updateStatusCode($notificationCode);
        });
    }
}
