<?php

namespace App\Http\Requests\Front\Employee;

use App\Http\Requests\FrontCoreRequest;

class DocumantRequest extends FrontCoreRequest
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
        $full_nameValidation = 'required';
        $ProfileImageValidation = 'image|mimes:jpeg,jpg,png,bmp|max:4000|min:1';

        return [
           
            'resume' => 'mimes:jpeg,jpg,png,bmp,pdf,doc,docx|max:4000',
            // 'offerLetter' => 'mimes:jpeg,jpg,png,bmp,pdf,doc,docx|max:4000',
            // 'joiningLetter' => 'mimes:jpeg,jpg,png,bmp,pdf,doc,docx|max:4000',
            // 'contract' => 'mimes:jpeg,jpg,png,bmp,pdf,doc,docx|max:4000',
            // 'IDProof' => 'mimes:pdf,jpeg,jpg,png,bmp|max:4000',
        ];
    }

}
