<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'address.zip_code' => ['required', 'string', 'max:9'],
            'address.street' => ['required', 'string', 'max:255'],
            'address.neighborhood' => ['required', 'string', 'max:255'],
            'address.number' => ['required', 'string', 'max:10'],
            'address.city' => ['required', 'string', 'max:255'],
            'address.state' => ['required', 'string', 'max:2'],
        ];
    }
}
