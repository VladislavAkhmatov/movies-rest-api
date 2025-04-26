<?php

namespace App\Http\Requests\Screening;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScreeningRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'film_id' => ['integer', 'exists:films,id'],
            'hall_id' => ['integer', 'exists:halls,id'],
            'start_time' => ['date_format:Y-m-d H:i', 'after_or_equal:start_time'],
            'price' => ['numeric', 'min:1'],
        ];
    }
}
