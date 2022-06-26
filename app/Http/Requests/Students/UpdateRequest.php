<?php

namespace App\Http\Requests\Students;
use App\Models\course;
use App\Enums\StudentStatusE;
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
                Rule::unique('students')->ignore($this->id)
            ],
            'description'=>[
                  'required',
            ],
             'birthday' =>[
                    'required'
             ],
             'avatar' =>[
                'nullable',
                'file',
                'image',
             ],
             'status'=>[
                'required',
                 'integer',
                  Rule::in(StudentStatusE::arrayStatus()),
             ],
             'course_id' =>[
                'required',
                 Rule::exists(course::class,'id'),
             ],
             'gender' =>[
                'required',
                'boolean',
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
