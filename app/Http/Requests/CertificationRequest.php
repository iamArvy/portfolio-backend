<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificationRequest extends FormRequest
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
            'details' => ['required', 'min:3', 'max:255'],
            'certified' => ['required','nullable', 'boolean'],
            'date' => ['required', 'min:4', 'max:4', ],
        ];
    }
}
