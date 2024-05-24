<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name'                  => 'sometimes|required|string|min:2|max:255',
            'email'                 => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'mobile_number'         => ['nullable', 'required', 'string', 'min:9', 'max:14', Rule::unique('users')->ignore($this->user)],
            'gender'                => ['nullable', Rule::in(['male', 'female'])],
            'image'                 => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'                => ['nullable', Rule::in(['available', 'unavailable'])],
        ];
    }
}
