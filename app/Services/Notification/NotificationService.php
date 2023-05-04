<?php

namespace App\Services\Notification;

use App\Services\Notification\DTOs\SelectTypeNotificationDto;
use App\Services\NotificationCode\Repositories\NotificationCodeRepository;
use Exception;

class NotificationService
{
    /**
     * @param NotificationCodeRepository $notificationRepository
     */
    public function __construct(
        public NotificationCodeRepository $notificationRepository,
    ) {
    }

    /**
     * @param SelectTypeNotificationDto $dto
     * @return void
     * @throws Exception
     */
    final public function selectTypeNotification(SelectTypeNotificationDto $dto): void
    {
        $notificationFactory = LogisticFactory::getFactory($dto->type);

        $notificationFactory->sendMessage();

        $this->saveCode($dto);
    }

    /**
     * @throws Exception
     */
    private function saveCode(SelectTypeNotificationDto $selectTypeNotificationDto): void
    {
        $randomInt = random_int(1111, 1111); //для тестирования
        $this->notificationRepository->saveCode($selectTypeNotificationDto->userId, $randomInt);
    }
}
