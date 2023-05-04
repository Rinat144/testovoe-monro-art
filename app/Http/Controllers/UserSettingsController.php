<?php

namespace App\Http\Controllers;

use App\Services\UserSettings\Exception\UserSettingsException;
use App\Services\UserSettings\Requests\ChangeDateOfBirthRequest;
use App\Services\UserSettings\UserSettingsService;
use Illuminate\Http\JsonResponse;

class UserSettingsController extends Controller
{
    public function __construct(
        public UserSettingsService $userSettingsService,
    ) {
    }

    /**
     * @param ChangeDateOfBirthRequest $changeDateOfBirthRequest
     * @return JsonResponse
     * @throws UserSettingsException
     */
    final public function changeDateOfBirth(ChangeDateOfBirthRequest $changeDateOfBirthRequest): JsonResponse
    {
        $this->userSettingsService->changeDateOfBirth($changeDateOfBirthRequest->getDto());

        return response()->json([
            'status' => true,
        ]);
    }
}
