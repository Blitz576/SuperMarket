<?php

namespace App\Http\Requests\Categories;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'description'           => 'nullable|string',
            'cover_image'           => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'                => ['nullable', Rule::in(['available', 'unavailable'])],
        ];
    }
}
