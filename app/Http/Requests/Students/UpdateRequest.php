<?php

namespace App\Http\Requests\Students;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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

            'name'=>[
                'bail',
                'required',
                'string',
                Rule::unique('student')->ignore($this->id)
            ],
            'description'=>[
                  'required',
            ],
             'birthday' =>[
                    'required'
             ]
        ];
    }
    public function messages()
    {
        return [
            'required'=>'Please Write :attribute ',
            'unique'=>':attribute Already Exits ',
        ];
    }

     public function attributes()
     {
         return [
             'name' => 'Ten',
         ];
     }
}
