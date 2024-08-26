<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'email'=>['required','email','unique:users,email'],
            'name'=>['required','string','min:2','max:20'],
            'password'=>['required','min:6','confirmed','regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])/'],
        ];
    }
    public function messages()
    {
        return [
            'password.regex' => 'Password must contain at least one uppercase letter,one digit, and one special character from @$!%*?&',
        ];
    }
}
