<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class imageRequest extends FormRequest
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
        'image'=>'required|min:1|max:5',
        'image.*'=>'file|mimes:png,jpg,jpeg,pdf,gif|max:2044',
           
        ];
    }
}
