<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
 * リクエストに適用するバリデーションルールを取得
 *
 * @return array
 */
public function rules()
{
    return [
        'title' => 'required|unique:articles|max:255',
        'body' => 'required',
    ];
}
}
