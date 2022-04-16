<?php

namespace App\Http\Requests;

use App\Rules\LayerGreaterThanParent;
use App\Rules\LayerLowerThanParent;
use App\Rules\LayerWithParent;
use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
            'parent_id' => 'nullable|exists:comments,id',
            'layer' => [
                'required',
                'numeric',
                'in:0,1,2',
                new LayerWithParent($this->parent_id),
            ],
            'user_name' => 'required|string',
            'comment' => 'required|string'
        ];
    }
}
