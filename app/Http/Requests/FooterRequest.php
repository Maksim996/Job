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
            'img_path' => 'required',
            'link' => 'nullable|url|max:200',
            'content_ua' => 'required|string',
            'content_ru' => 'required|string',
            'content_us' => 'required|string',
            'type' => 'required|max:200',
            'name' => 'required|max:200',
            'color_bg' => 'nullable|max:200',
        ];
    }

    public function attributes() {
        return [
            'img_path' => 'Загрузка фото',
            'link' => 'Посилання',
            'content' => 'Текст',
            'type' => 'Тип посилання',
            'name' => 'Назва сціальної мережі',
            'color_bg' => 'Кольор при наведенні на логотип соціальної мережі',
        ];
    }
}
