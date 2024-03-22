<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class EditCateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $id = $request->segment(4);

        return [
            'name' => 'unique:vp_categories,cate_name,' . $id . ',id'
        ];
    }
    public function messages()
    {
        return [
            'name.unique'=>'Tên danh mục đã bị trùng!'
        ];
    }
}
