<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            //
             'title' => 'required|max:100',
             'body' => 'required',
             'image_path' => 'required|mimes:jpeg,bmp,png'
        ];
    }

    public function messages()
    {
        return[
            'title.required' => ':attributeに入力が必要です。',
            'title.max' => ':attributeは100文字以内です。',
            'body.required' => ':attributeに入力が必要です。',
            'image_path.required' => ':attributeが必要です。'
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'body' => '本文',
            'image_path' => '画像',
            'user_id' => '投稿者ID'

        ];
    }
}
