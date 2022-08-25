<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseFormRequest extends FormRequest
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
            'name' => 'required', 
            'start_date' => 'required',
            'end_date' => 'required',
            'fee' => 'required|integer',
            'image' => 'required|image', 
            'short_description' => 'required', 
            'long_description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fee.integer' => 'Fee must have number value',
            'image.image' => 'Invalid Image File'

        ];
    }
}
