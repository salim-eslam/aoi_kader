<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreCatalog extends FormRequest
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
            'title_en' => 'required|max:256',
            'title_ar' => 'required|max:256',
            // "file" => "required|mimes:pdf|max:10000",
            'status' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title_en.required' => 'الملف باللغه الانجليزيه مطلوب',
            'title_en.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'title_ar.max:256'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 256 حرف',
            'title_ar.required'  => 'الاسم باللغه العربيه مطلوب',
            'file.required' => 'الملف   مطلوب',
            'file.mimes' => 'الملف المطلوب يجب ان يكون بصيغه pdf',
            'file.size' => 'الملف لا تزيد مساحته عن 1ميجا ',
            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
