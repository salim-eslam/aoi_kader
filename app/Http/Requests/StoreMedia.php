<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMedia extends FormRequest
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
            'title_en' => 'required|string|max:256',
            'title_ar' => 'required|string|max:256',
            'type'=>'required',
            'file'=> 'required',
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title_en.required' => 'الاسم باللغه الانجليزيه مطلوب',
            'title_en.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'title_ar.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'title_ar.required'  => 'الاسم باللغه العربيه مطلوب',
            'type.required'  => 'النوع مطلوب',
            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
