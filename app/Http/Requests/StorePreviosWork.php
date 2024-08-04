<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StorePreviosWork extends FormRequest
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
            'description_en' => 'required|string|max:65000',
            'description_ar' => 'required|string|max:65000',
            'body_en' => 'required|max:65000',
            'body_ar' => 'required|max:65000',
            'image'=>['required',File::image()->types(['jpeg','png','jpg','gif'])->max(1024)],
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

            'description_ar.max:256'=>'يجب الا يتخطي عدد حروف الوصف اكثر من 256 حرف',
            'description_en.max:256'=>'يجب الا يتخطي عدد حروف الوصف اكثر من 256 حرف',
            'description_ar.required'  => 'الوصف باللغه العربيه مطلوب',
            'description_en.required'  => 'الوصف باللغه الانجليزيه مطلوب',

            'body_ar.max:65000'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 65000 حرف',
            'body_en.max:65000'=>'يجب الا يتخطي عدد حروف الاسم اكثر من 65000 حرف',
            'body_ar.required'  => 'المقال باللغه العربيه مطلوب',
            'body_en.required'  => 'المقال باللغه الانجليزيه مطلوب',

            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
