<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubcategoryRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'title' => 'required|max:200',
            'type' => 'required|max:200',
            'link' => 'required|url|max:200',
        ];
    }

    public function attributes() {
        return [
            'category_id' => 'Ідентифікатор категорії',
            'title' => 'Назва підкатегорії',
            'type' => 'Тип підкатегорії',
            'link' => 'Посилання',
        ];
    }
}
