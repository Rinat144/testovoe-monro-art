<?php

namespace App\Services\UserSettings\Requests;

use App\Services\UserSettings\DTOs\ChangeDateOfBirthDto;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChangeDateOfBirthRequest extends FormRequest
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
            'code' => ['required', 'digits:4'],
            'user_id' => ['required', 'integer'],
            'date_of_birth' => ['required', 'date_format:Y-m-d', 'before:today'],
        ];
    }

    final public function getDto(): ChangeDateOfBirthDto
    {
        return new ChangeDateOfBirthDto(
            code: $this->get('code'),
            userId: $this->get('user_id'),
            dateOfBirth: $this->get('date_of_birth')
        );
    }
}
