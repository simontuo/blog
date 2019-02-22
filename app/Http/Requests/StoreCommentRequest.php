<?php

namespace App\Http\Requests;


class StoreCommentRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'content' => '评论内容',
        ];
    }
}
