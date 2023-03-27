<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects,title|max:128',
            'description' => 'required|max:4096',
            'img' => 'nullable|image|max:2048',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array|exists:technologies,id'
        ];
    }
}
