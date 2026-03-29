<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReorderBlockRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'direction' => 'required|string|in:up,down'
        ];
    }

    public function messages(): array
    {
        return [
            'direction.required' => 'The direction is required.',
            'direction.string' => 'The direction must be a string.',
            'direction.in' => 'The direction must be either "up" or "down".',
        ];
    }

    public function attributes(): array
    {
        return [
            'direction' => 'reorder direction',
        ];
    }
}
