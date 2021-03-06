<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsRequest extends FormRequest
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
            'subcategory_id' => 'required|integer',
            'title' => 'required|max:200',
            'doc_date' => 'required|date',
            'file_link' => 'required|url|max:200',
        ];
    }

    public function attributes() {
        return [
            'subcategory_id' => 'Категорія документу',
            'title' => 'Заголовок документу',
            'doc_date' => 'Дата документу',
            'file_link' => 'Посилання',
        ];
    }
}
