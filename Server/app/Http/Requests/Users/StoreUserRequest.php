<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'                  => 'required|string|min:2|max:255',
            'email'                 => ['email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'mobile_number'         => ['nullable', 'string', 'min:9', 'max:14', Rule::unique('users')->ignore($this->user)],
            'gender'                => ['nullable', Rule::in(['male', 'female'])],
            'password'              => ['required', Password::min(8), 'max:20', 'confirmed'],
            'password_confirmation' => ['required', 'same:password'],
            'image'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role'                  => ['nullable', Rule::in(['user', 'administrator'])],
            'status'                => ['nullable', Rule::in(['available', 'unavailable'])],
        ];
    }
}
