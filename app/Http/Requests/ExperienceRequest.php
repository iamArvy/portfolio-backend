<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:255'],
            'location' => ['required', 'min:3', 'max:255'],
            'p' => ['required', 'min:3', 'max:255'],
            'start' => ['required', 'min:4', 'max:4'],
            'end' => ['nullable', 'min:4', 'max:4'],
        ];
    }
}
