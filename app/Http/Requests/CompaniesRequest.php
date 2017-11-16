<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompaniesRequest extends FormRequest
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

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'title' => 'unique:companies|required',
                    'code' => 'unique:companies|required',
                    'contact' => 'required',
                    'company_email' => 'unique:companies,email|email|required',
                    'username' => 'unique:users|required',
                    'password' => 'required|confirmed',
                    'password_confirmation' => 'required',
                    'email' => 'unique:users|email|required',
                    'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'backdrop' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {

                 return [
                    'title' => 'unique:companies,title,'.$this->company->id.'|required',
                    'code' => 'unique:companies,code,'.$this->company->id.'|required',
                    'contact' => 'required',
                    'company_email' => 'unique:companies,email,'.$this->company->id.'|email|required',
                    'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'backdrop' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ];
            }
            default:break;
        }
        
    }

    public function messages()
    {
        return [
            'title.unique' => 'Company name has already been taken.',
            'password.confirmed' => 'Passwords do not match.',
            'company_email.unique' => 'Company email has already been taken.',
            'email.unique' => 'User email has already been taken.',
            'email.required' => 'User email is required.',
            'email.email' => 'User email must be a valid email address.'
        ];
    }
}
