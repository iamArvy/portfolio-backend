<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class ProjectsRequest extends FormRequest
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
        // dd(Route::currentRouteName());
        return [
            'name' => ['required', 'min:3', 'max:255'],
            'img' => $this->imgval(),
            'about' => ['required', 'min:3', 'max:255'],
            'stacks' => ['required', 'min:3', 'max:255'],
            'url' => ['required', 'min:3', 'max:255'],
            'git' => ['required', 'min:3', 'max:255'],
        ];
    }
    protected function imgval(){
        if(Route::currentRouteName()==='project.edit'){
            return ['nullable', 'image'];
        }
        if(Route::currentRouteName()==='project.create'){
            return ['required', 'image'];
        }
    }
}
