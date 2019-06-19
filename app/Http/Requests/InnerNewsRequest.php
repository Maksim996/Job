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
            // 'title' => 'required|max:200',
            // 'date' => 'required|date',
            // 'full_location' => 'nullable|max:200',
            // 'full_description' => 'required|max:200',
            // 'keywords' => 'required|max:200',
            // 'description' => 'required|max:200',
            // 'img_path' => 'required',
            // 'short_location' => 'required|max:200',
            // 'short_description' => 'required|max:200',
            // 'files' => 'required',
        ];
    }

    public function attributes() {
        return [
            'title' => 'Заголовок',
            'date' => 'Дата та час проведення',
            'full_location' => 'Місце проведення повне',
            'full_description' => 'Детальний опис',
            'keywords' => 'Ключові слова',
            'description' => 'Опис',
            'img_path' => 'Головне зображення',
            'short_location' => 'Місце проведення коротке',
            'short_description' => 'Короткий опис',
            'files' => 'Зображення для слайдера',
        ];
    }
}
