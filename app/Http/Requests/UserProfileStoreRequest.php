<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileStoreRequest extends FormRequest
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
            'professional_status' => 'required|integer',
            'skills'    => 'required|string',
            'company'   => 'string',
            'website'   => 'string',
            'location'  => 'required|string',
            'short_bio' => 'required|string',
        ];
    }
}
