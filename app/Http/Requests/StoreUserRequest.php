<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|max:255",
            "email" => "required|max:255",
            "password" => ['required', 'confirmed', Password::min(8)->mixedCase()],
            "password_confirmation" => "nullable",
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "type" => "required",
        ];
    }
}
