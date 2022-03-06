<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleForm extends FormRequest
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
        if (empty($this->article)) {
            $id = '';
        } else {
            $id = $this->article->id;
        }

        return [
            'name'              => 'required|min:5|max:100',
            'short_description' => 'required|max:100',
            'description'       => 'required',
            'url'               => [
                'required',
                Rule::unique('articles')->ignore($id),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'              => 'Поле "Название" обязательно для заполнения',
            'short_description.required' => 'Поле "Адрес статьи" обязательно для заполнения',
            'description.required'       => 'Поле "Краткое описание" обязательно для заполнения',
            'url.required'               => 'Поле "Статья" обязательно для заполнения',
            'url.unique'                 => 'URL-адрес уже занят',
        ];
    }
}
