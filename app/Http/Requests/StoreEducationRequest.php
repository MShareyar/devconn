<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'school' => 'required|string|min:6',
            'degree' => 'required|string|min:6',
            'field_of_study' => 'required|string|min:6',
            'start_date' => 'required|date',
            'end_date' => 'required_if:is_currently_active,0|after:start_date',
            'is_currently_active' => 'required|boolean',
            'description' => 'string|max:255'
        ];
    }

    public function messages()
    {
        return[
            'end_date.after' => 'The end date must be a date greater than from date'
        ];
    }
}
