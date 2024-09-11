<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogUpdateRequest extends FormRequest
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
            'summary' => 'nullable|string|max:500',
            'content' => 'required|string',
            'is_published' => 'required',
        ];
    }

    /**
     * Modify the input data before validation.
     *
     * @return array
     */
    // protected function prepareForValidation()
    // {
    //     $user = authenticated();
    //     $this->merge([
    //         'published_at' => now(),
    //         'updated_by' => $user->id,
    //     ]);
    // }
}
