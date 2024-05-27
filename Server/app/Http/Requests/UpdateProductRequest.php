<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'summary' => 'required|string|min:10',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'rate' => 'required|numeric|min:0|max:5',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'show_in_homepage' => 'in:show,hide',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];
    }
}
