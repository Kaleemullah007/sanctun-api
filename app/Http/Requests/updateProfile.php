<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateProfile extends FormRequest
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
            'name'=>'required|alpha',
            'email'=>'required|unique:users,email,'.auth()->id(),
            'status'=>'required|boolean'
        ];
    }

    public function messages(){

        return [
            'name'=>'Only letters are allowed',
            'email.unique'=>'No duplicate email',
            'status'=>'required|boolean'
        ];

    }


    public function prepareForValidation()
    {
         
        $this->merge(['name'=>$this->name.'Rao','status'=>false]);
    }

  
}
