<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
               'title' => 'required|unique:posts|min:3|max:30',
               'content' => 'required'
           ];
    }
    public function messages()
    {
        return[
            'title.required' => 'タイトルを入力して下さい',
            'title.unique' => 'このタイトルはすでに使用されています',
            'title.min' => 'タイトルは3文字以上にして下さい',
            'title.max' => 'タイトルは30文字以内にして下さい',
            'content.required' => '本文を入力して下さい',
        ];
    }
}
