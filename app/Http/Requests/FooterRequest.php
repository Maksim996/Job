<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FooterRequest extends FormRequest
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
            'img_path' => 'bail|required|max:200',
            'link' => 'nullable|url|max:200',
            'content_ua' => 'required|string',
            'content_ru' => 'required|string',
            'content_us' => 'required|string',
            'type' => 'required|max:200',
            'name' => 'required|max:200',
            'color_bg' => 'nullable|max:200',
        ];
    }
}
