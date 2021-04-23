<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string','between:3,100'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','between:8,20'],
            'image' => ['required','image','between:10,500'],
            'date_of_birth' => ['required','date','before:today'],
        ];
    }
}
