<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
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
    public function rules()
    {
        return [
            'name_en' => 'required|string|max:256',
            'name_ar' => 'required|string|max:256',
            'role_en' => 'required|string|max:256',
            'role_ar' => 'required|string|max:256',
            'comment_en' => 'required|max:256',
            'comment_ar' => 'required|max:256',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name_en.required' => 'الاسم باللغه الانجليزيه مطلوب',
            'name_en.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'name_ar.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'name_ar.required'  => 'الاسم باللغه العربيه مطلوب',

            'role_ar.max:256'=>'يجب الا يتخطي عدد حروف المسمي الوظيفي اكثر من 256 حرف',
            'role_en.max:256'=>'يجب الا يتخطي عدد حروف المسمي الوظيفي اكثر من 256 حرف',
            'role_ar.required'  => 'المسمي الوظيفي باللغه العربيه مطلوب',
            'role_en.required'  => 'المسمي الوظيفي باللغه الانجليزيه مطلوب',

            'comment_ar.max:65000'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 65000 حرف',
            'comment_en.max:65000'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 65000 حرف',
            'comment_ar.required'  => 'التعليق باللغه العربيه مطلوب',
            'comment_en.required'  => 'التعليق باللغه الانجليزيه مطلوب',

            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
