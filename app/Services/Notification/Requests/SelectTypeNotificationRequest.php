<?php

namespace App\Services\Notification\Requests;

use App\Services\Notification\DTOs\SelectTypeNotificationDto;
use App\Services\Notification\Enum\NotificationEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SelectTypeNotificationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    final public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    final public function rules(): array
    {
        return [
            'type' => ['required', Rule::in(array_column(NotificationEnum::cases(), 'value'))],
            'user_id' => ['required', 'integer']
        ];
    }

    final public function getDto(): SelectTypeNotificationDto
    {
        return new SelectTypeNotificationDto(
            type: $this->get('type'),
            userId: $this->get('user_id'),
        );
    }
}
