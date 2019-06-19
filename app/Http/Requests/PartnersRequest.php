<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnersRequest extends FormRequest
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
            'img_path' => 'required',
            'link' => 'required|url|max:200',
            'name_brand' => 'required|max:200',
        ];
    }

    public function attributes() {
        return [
            'img_path' => 'Загрузка фото',
            'link' => 'Посилання',
            'name_brand' => 'Ім\'я партнера',
        ];
    }
}
