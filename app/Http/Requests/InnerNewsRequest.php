<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InnerNewsRequest extends FormRequest
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
            //'type' => 'bail|required|max:200',
            'title' => 'required|max:200',
            'date' => 'required|date',
            'full_location' => 'nullabel|max:200',
            //'full_description' => 'required|max:200',
            'keywords' => 'required|max:200',
            'description' => 'required|max:200',
        ];
    }
}
