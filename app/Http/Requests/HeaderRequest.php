<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HeaderRequest extends FormRequest
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
            'img_path' => 'bail|required|url|max:200',
            'title' => 'required|max:200',
            'link' => 'required|url',
            'content' => 'required|string',
            'keywords' => 'required|string|max:200',
            'description' => 'required|string|max:200',
        ];
    }
}
