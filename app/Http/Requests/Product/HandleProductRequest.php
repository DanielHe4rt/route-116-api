<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class HandleProductRequest extends FormRequest
{
    public function authorization(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'thumb_url' => ['nullable'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer']
        ];
    }
}
