<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlockRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'is_active' => 'boolean',
            'content' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The block title is required.',
            'title.string' => 'The block title must be a string.',
            'title.max' => 'The block title may not be greater than 255 characters.',
            'type.required' => 'The block type is required.',
            'type.string' => 'The block type must be a string.',
            'type.max' => 'The block type may not be greater than 100 characters.',
            'content.required' => 'The block content is required.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'block title',
            'type' => 'block type',
            'is_active' => 'active status',
            'content' => 'block content',
        ];
    }
}
