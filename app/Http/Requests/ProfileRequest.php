<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
                    'name' => 'required',
                    'email' => 'unique:users,email,'.$this->user->id.'|email|required',
                    'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ];
            }
            case 'PUT':
            case 'PATCH':
            default:break;
        }
    }
}
