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
            'card_link1' => 'required|url|max:200',
            'img_path1' => 'required',
            'card_title1' => 'required|max:200',
            'card_description1' => 'required|string',

            'card_link2' => 'required|url|max:200',
            'img_path2' => 'required',
            'card_title2' => 'required|max:200',
            'card_description2' => 'required|string',

            'card_link3' => 'required|url|max:200',
            'img_path3' => 'required',
            'card_title3' => 'required|max:200',
            'card_description3' => 'required|string',
        ];
    }

    public function attributes() {
        return [
            'card_link1' => 'Посилання1',
            'img_path1' => 'Зображення1',
            'card_title1' => 'Заголовок1',
            'card_description1' => 'Короткий опис1',

            'card_link2' => 'Посилання2',
            'img_path2' => 'Зображення2',
            'card_title2' => 'Заголовок2',
            'card_description2' => 'Короткий опис2',

            'card_link3' => 'Посилання3',
            'img_path3' => 'Зображення3',
            'card_title3' => 'Заголовок3',
            'card_description3' => 'Короткий опис3',
        ];
    }
}
