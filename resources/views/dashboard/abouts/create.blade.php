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
                <h4 class="content-title mb-0 my-auto">اضافه about</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('abouts.index') }}">جميع الاعمال</a>

        </div>
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

                    <form id="formData" method="post" action="{{ route('abouts.store') }}" class="needs-validation " enctype="multipart/form-data">
                        @csrf
                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6">
                                <label class="form-label h5">العنوان باللغه العربيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل العنوان باللغه العربيه" type="text"
                                        name="title_ar" value="{{ old('title_ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">العنوان باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل العنوان باللغه الانجليزيه" type="text"
                                        name="title_en" value="{{ old('title_en') }}">
                                </div><!-- main-form-group -->
                            </div>


                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">مقال باللغه العربيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_body_ar" name="body_ar" value="{{ old('body_ar') }}" class="form-control" placeholder="Textarea" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">مقال باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_body_en" name="body_en" value="{{ old('body_en') }}" class="form-control" placeholder="Textarea" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الصوره</label>
                                <div class="form-group">
                                    <input  name="image" type="file" class="dropify" data-height="200" multiple />
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الحاله</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        <option value="active" selected>مفعل</option>
                                        <option value="disabled">غير مفعل</option>
                                    </select>
                                </div>
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
        ClassicEditor
            .create(document.querySelector('#Pre_work_body_ar'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#Pre_work_body_en'))
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
