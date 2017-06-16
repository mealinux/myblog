<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateRequest extends FormRequest
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
          'article_category' => 'required',
          'label' => '',
          'title' => 'required',
          'content' => 'required',
          'title_picture' => '',
          'special_note' => '',
          'keywords' => 'required',
          'descriptions' => 'required'
        ];
    }
}
