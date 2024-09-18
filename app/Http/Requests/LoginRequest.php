<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this as needed based on your authorization logic
    }

    public function rules()
    {
        return [
            'email' => 'required|email', // Example rule: email is required and must be a valid email address
            'password' => 'required|string|min:8', // Example rule: password is required, must be a string, and at least 8 characters long
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email address.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    }
}
