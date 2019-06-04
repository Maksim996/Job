<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreviewRequest extends FormRequest
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
            'inner_news_id' => 'bail|required|integer',
            //'img_path' => 'required|url|max:200',
            'short_location' => 'required|max:200',
            'short_description' => 'required|max:200',
        ];
    }
}
