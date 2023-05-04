<?php

namespace App\Http\Controllers;

use App\Services\Notification\NotificationService;
use App\Services\Notification\Requests\SelectTypeNotificationRequest;
use Exception;

class NotificationController extends Controller
{
    /**
     * @param NotificationService $notificationService
     */
    public function __construct(
        public NotificationService $notificationService,
    ) {
    }

    /**
     * @param SelectTypeNotificationRequest $selectTypeNotificationRequest
     * @return void
     * @throws Exception
     */
    final public function selectTypeNotification(SelectTypeNotificationRequest $selectTypeNotificationRequest): void
    {
        $this->notificationService->selectTypeNotification($selectTypeNotificationRequest->getDto());
    }
}
