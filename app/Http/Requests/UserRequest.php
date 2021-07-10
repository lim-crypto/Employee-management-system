<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => 'image|nullable',
            'password' => ['required', 'string', 'min:8'],
            'confirmPassword' => ['required', 'string', 'min:8'],
            'role_id' => 'required',
            'position_id' => 'required',
            'department_id' => 'required',
            'dateHired' =>  ['required', 'string', 'max:255'],
        ];
    }
    public function messages()
    {
        return [
            'role_id.required' => 'Role is required',
            'position_id.required' => 'Position is required',
            'department_id.required' => 'department is required',
        ];
    }
}
