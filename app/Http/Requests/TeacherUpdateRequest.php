<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherUpdateRequest extends FormRequest
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
            'email' => 'required', 
            'image' => 'image', 
            'nid' => 'integer',
        ];
    }
    public function messages()
    {
        return [
            'nid.integer' => 'National Identification Number must be number',
            'image.image' => 'File must be an Image'
        ];
    }
}
