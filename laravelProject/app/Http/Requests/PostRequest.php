<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
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
        // $user = Auth::user();
        return [
            'title' => [
                'required',
                Rule::unique('articles')->ignore($this->input('id'))->where(function($query) {
                    $query->where('user_id', $this->user()->id);
                }),
                'max:255'
            ],
            'body' => 'required',
        ];
    }
}
