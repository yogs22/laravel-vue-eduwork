<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberValidation extends FormRequest
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
            'name'         => 'required|min:3|max:64',
            'gender'       => 'required|in:L,P|max:1',
            'phone_number' => 'required|max:14',
            'address'      => 'required',
            'email'        => 'required|email|max:64'
        ];
    }
}
