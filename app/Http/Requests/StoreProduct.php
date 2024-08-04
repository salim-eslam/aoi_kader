<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class StoreProduct extends FormRequest
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
            'description_en' => 'required|string|max:65000',
            'description_ar' => 'required|string|max:65000',
            'material_en' => 'required|max:255',
            'material_ar' => 'required|max:255',
            'image'=>['required',File::image()->types(['jpeg','png','jpg','gif'])->max(1024)],
            'code'=>'required|string|unique:products,code',
            'length'=>'required|numeric',
            'width'=>'required|numeric',
            'height'=>'required|numeric',
            'department_id'=>'required|numeric',
            // 'offer_price'=>'numeric',
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

            'description_ar.max:256'=>'يجب الا يتخطي عدد حروف الوصف اكثر من 256 حرف',
            'description_en.max:256'=>'يجب الا يتخطي عدد حروف الوصف اكثر من 256 حرف',
            'description_ar.required'  => 'الوصف باللغه العربيه مطلوب',
            'description_en.required'  => 'الوصف باللغه الانجليزيه مطلوب',

            'material_ar.max:255'=>'يجب الا يتخطي عدد حروف المدخل اكثر من 255 حرف',
            'material_en.max:255'=>'يجب الا يتخطي عدد حروف المدخل اكثر من 255 حرف',
            'material_ar.required'  => 'الخامه باللغه العربيه مطلوب',
            'material_en.required'  => 'الخامه باللغه الانجليزيه مطلوب',

            'code.required' => 'كود المنتج مطلوب',
            'code.unique' => 'كود المنتج تم تسجيله مسبقا',

            'length.required' => 'طول المنتج مطلوب',
            'width.required' => 'عرض المنتج مطلوب',
            'height.required' => 'ارتفاع المنتج مطلوب',
            'department_id.required' => 'يجب اختيار  القسم ',
            'category_id.required' => 'يجب اختيار الفئه ',
            'code.numeric' => 'كود المنتج يجب ان يكون رقم',
            'length.numeric' => 'طول المنتج يجب ان يكون رقم',
            'width.numeric' => 'عرض المنتج يجب ان يكون رقم',
            'height.numeric' => 'ارتفاع المنتج يجب ان يكون رقم',
            // 'offer_price.numeric'=>'يجب ان يكون السعر رقم',
            'status.required' => 'حاله القسم مطلوبه'
        ];
    }
}
