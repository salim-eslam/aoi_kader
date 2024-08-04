<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartment extends FormRequest
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
            'name_en' => 'required|max:256',
            'name_ar' => 'required|max:256',
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
            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
