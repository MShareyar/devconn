<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperienceRequest extends FormRequest
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
            'title' => 'required|string|min:6',
            'company' => 'required|string|min:6',
            'location' => 'required|string|min:6',
            'start_date' => 'required|date',
            'end_date' => 'required_if:is_currently_active,false|after:start_date|nullable',
            'is_currently_active' => 'required|boolean',
            'description' => 'string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'end_date.after' => 'The end date must be a date greater than from date'
        ];
    }
}
