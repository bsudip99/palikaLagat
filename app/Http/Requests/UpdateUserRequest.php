<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|',
            'email' => 'required|email|unique:users,email,'.$this->user,
            'phone_number' => 'sometimes|nullable',
            'citizenship_no' => 'sometimes|nullable',
            'gender' => 'sometimes|nullable',
            'role_id' => 'required|array',
            'address' => 'sometimes|nullable',
            'dob' => 'sometimes|nullable',
            'blood_group' => 'sometimes|nullable',
            'citizenship' => 'image|mimes:jpeg,png,jpg|max:10240',
            'pp_image' => 'image|mimes:jpeg,png,jpg|max:10240',
            'other_documents' => 'image|mimes:jpeg,png,jpg|max:10240'
        ];
      }
}
