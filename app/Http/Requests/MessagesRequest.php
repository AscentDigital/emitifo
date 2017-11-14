<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
                    'campaign_id' => 'required',
                    'message' => 'required|max:160',
                    'recipients' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                 return [
                    'name' => 'required',
                    'slug' => 'required|unique:cities,slug,' . $this->city->id
                ];
            }
            default:break;
        }
    }

    public function messages(){
        return [
            'campaign_id.required' => 'Please select a campaign.',
            'recipients.required' => 'Please select a recipient.'
        ];
    }
}
