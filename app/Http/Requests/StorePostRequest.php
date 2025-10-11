<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
    $postId = $this->route('id');

    return [
        'title' => [
            'required',
            'min:3',
            'max:255',
            Rule::unique('posts', 'title')->ignore($postId),
        ],
        'body' => 'required|string',
        'user_id' => 'required|integer',
        'image' => 'nullable|image',
    ];

}

}
