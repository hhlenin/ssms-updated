<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFormUpdateRequest extends FormRequest
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
                'name'  => 'required',
                'email' => 'required | email',
                'image' => 'image'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => "Email can't be empty",
            'email.email' => "Not a valid email",
            'image.image' => 'Not a valid image'
        ];
 
    }
}
