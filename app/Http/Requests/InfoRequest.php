<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
            'nickname' => ['required', 'min:3', 'max:255'],
            'brand' => ['required', 'min:3', 'max:255'],
            'other_nickname' => ['required', 'min:3', 'max:255'],
            'gender' => ['required', 'min:3', 'max:255'],
            'job_desc' => ['required', 'min:3', 'max:255'],
            'origin' => ['required', 'min:3', 'max:255'],
            'currently' => ['required', 'min:3', 'max:255'],
            'phone' => ['required', 'min:3', 'numeric'],
            'cv' => ['file']
        ];
    }
}
