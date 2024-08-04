@extends('layouts.dashbord.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/quill/quill.bubble.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/admin/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/admin/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">اضافه منتج</h4>
            </div>
        </div>
        @can('product-list')

        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('products.index') }}">جميع المنتجات</a>

        </div>
        @endcan
    </div>
    <!-- breadcrumb -->
@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form id="formData" method="post" action="{{ route('products.store') }}"
                        class="needs-validation " enctype="multipart/form-data">
                        @csrf
                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6">
                                <label class="form-label h5">الاسم باللغه العربيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل الاسم باللغه العربيه" type="text"
                                        name="name_ar"  value="{{ old('name_ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">الاسم باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل الاسم باللغه الانجليزيه" type="text"
                                        name="name_en"  value="{{ old('name_en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">الخامه باللغه العربيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل الخامه باللغه العربيه" type="text"
                                        name="material_ar"  value="{{ old('material_ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">الخامه باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل الخامه باللغه الانجليزيه" type="text"
                                        name="material_en"  value="{{ old('material_en') }}">
                                </div><!-- main-form-group -->
                            </div>


                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5"> كود المنتج </label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="كود المنتج" type="text" name="code"  value="{{ old('material_en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5"> ابعاد المنتج </label>
                                <div class="input-group">
                                    <input class="form-control" placeholder="الطول" type="number" name="length" value="{{ old('length') }}">
                                    <input class="form-control" placeholder="العرض" type="number" name="width" value="{{ old('width') }}">
                                    <input class="form-control" placeholder="الارتفاع" type="number" name="height" value="{{ old('height') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الوصف باللغه العربيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_description_ar" name="description_ar" class="form-control" placeholder="الوصف (عربي)"
                                        rows="5"  value="{{ old('description_ar') }}"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الوصف باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_description_en" name="description_en" class="form-control" placeholder="الوصف (انجليزي)"
                                        rows="5"  value="{{ old('description_en') }}"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="department_id">اختار القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="department_id" name="department_id">
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" selected>
                                                {{ $department->getTranslation('name', 'ar') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            {{-- <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="category_id">اختار الفئه</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="category_id" name="category_id">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" selected>
                                                {{ $category->getTranslation('name', 'ar') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5"> سعر المنتج </label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="سعر المنتج" type="number" name="offer_price"  value="{{ old('offer_price') }}">
                                </div><!-- main-form-group -->
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        <option value="active" selected>مفعل</option>
                                        <option value="disabled">غير مفعل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الصوره</label>
                                <div class="form-group">
                                    <input name="image" type="file" class="dropify" data-height="200" multiple />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">Seo Description Ar</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder=" seo Description Ar" type="text"
                                        name="seo_description_ar"  value="{{ old('seo_description_ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">Seo Description En</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Seo Description En" type="text"
                                        name="seo_description_en"  value="{{ old('seo_description_en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">Seo Keyword Ar</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder=" Seo Keyword Ar" type="text"
                                        name="seo_keywords_ar"  value="{{ old('seo_keywords_ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">Seo Keyword En</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Seo Keyword En" type="text"
                                        name="seo_keywords_en"  value="{{ old('seo_keywords_en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                {{-- <label class="form-label h5">خصومات</label> --}}
                                <label class="ckbox"><input name="offerd" value="true" type="checkbox"><span>خصومات</span></label>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0 ">
                                {{-- <label class="form-label h5">متوفر</label> --}}
                                <label class="ckbox"><input name="stocked" value="true" type="checkbox"><span>متوفر</span></label>
                            </div>

                            <div class="m-5">
                            </div>


                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="fancy-file-uploader/jquery.ui.widget.js"></script>

    <!--Internal  Select2 js -->
    <script src="{{ URL::asset('assets/admin/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.steps js -->
    <script src="{{ URL::asset('assets/admin/plugins/jquery-steps/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/js/form-editor.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/admin/plugins/quill/quill.min.js') }}"></script> --}}
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/fileuploads/js/file-upload.js') }}"></script>




    <script>
        ClassicEditor
            .create(document.querySelector('#Pre_work_description_ar'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#Pre_work_description_en'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <!--Internal  Form-wizard js -->
    {{-- <script src="{{URL::asset('assets/admin/js/form-wizard.js')}}"></script> --}}
@endsection
