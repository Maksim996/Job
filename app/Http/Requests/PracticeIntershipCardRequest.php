<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeIntershipCardRequest extends FormRequest
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
            'content_id' => 'bail|required|integer',
            'card_link' => 'required|url|max:200',
            'img_path' => 'required|url|max:200',
            'card_title' => 'required|max:200',
            'card_description' => 'required|string',
        ];
    }
}
