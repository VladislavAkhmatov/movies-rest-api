<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
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
            'title' => ['string', 'max:255'],
            'description' => ['string'],
            'duration_minute' => ['integer', 'min:1'],
            'poster_url' => ['string'],
            'release_date' => ['date'],
            'genres_ids' => ['array'],
            'genres_ids.*' => ['integer', 'exists:genres,id'],
        ];
    }
}
