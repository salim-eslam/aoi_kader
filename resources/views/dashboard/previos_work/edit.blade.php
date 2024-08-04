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
                <h4 class="content-title mb-0 my-auto">تعديل العمل</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary m-1 " href="{{ route('previos_works.index') }}">الاعمال</a>
            <a href="{{ route('comment.create', $previos_work->id) }}" class="btn btn-info " title="تعديل">اضافه تعليق</a>
        </div>

    </div>
    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-info">{{ $error }}</div>
                    @endforeach
                @endif
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form method="post" action="{{ route('previos_work.photo.store') }}" class="needs-validation "
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6">
                                <label class="form-label h5">المرفقات</label>
                                <div class="form-group">
                                    <input class="form-control"type="text" name="id" value="{{ $previos_work->id }}"
                                        style="display: none">
                                    <input class=" form-control-sm"type="file" name="photo[]" id="photo" multiple>
                                    <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                                </div><!-- main-form-group -->


                            </div>


                        </div>
                    </form>
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover  text-md-nowrap" id="example1" data-page-length='50'
                            style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-20p border-bottom-0"></th>
                                    <th class="wd-10p border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($previos_work->photos as $photo)
                                    <tr>

                                        <td style=" text-align:right "> <a type="image" target="_blank"
                                                href="{{ '/images/previos_work/attachments/' . $photo->src }}">
                                                <img class="rounded float-start h-25"
                                                    style="max-width:30px; max-height:30px"
                                                    src="{{ '/images/previos_work/attachments/' . $photo->src }}">
                                            </a></td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="{{ $photo->id }}"
                                                data-username="الصوره"
                                                data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف العمل السابق</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('previos_works_photo_destroy',0) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="photo_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <form id="formData" method="post" action="{{ route('previos_works.update', $previos_work) }}"
                        class="needs-validation " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row row-xs formgroup-wrapper">
                            <div class="col-md-6">
                                <label class="form-label h5">العنوان باللغه العربيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل العنوان باللغه العربيه" type="text"
                                        name="title_ar" value="{{ $previos_work->getTranslation('title', 'ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">العنوان باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="ادخل العنوان باللغه الانجليزيه" type="text"
                                        name="title_en" value="{{ $previos_work->getTranslation('title', 'en') }}">
                                </div><!-- main-form-group -->
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">وصف باللغه العربيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_description_ar" name="description_ar" class="form-control" placeholder="Textarea"
                                        rows="5">
                                       {{ $previos_work->getTranslation('description', 'ar') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">وصف باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_description_en" name="description_en" class="form-control" placeholder="Textarea"
                                        rows="5">
                                        {{ $previos_work->getTranslation('description', 'en') }}

                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">مقال باللغه العربيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_body_ar" name="body_ar" class="form-control" placeholder="Textarea" rows="5">
                                        {{ $previos_work->getTranslation('body', 'ar') }}

                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">مقال باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <textarea id="Pre_work_body_en" name="body_en" class="form-control" placeholder="Textarea" rows="5">
                                        {{ $previos_work->getTranslation('body', 'en') }}

                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">الصوره</label>
                                <div class="form-group">
                                    <input name="image" type="file" class="dropify" data-height="200" multiple />
                                    <a type="image" target="_blank"
                                        href="{{ '/images/previos_work/layout/' . $previos_work->image }}">
                                        <img class="rounded float-start h-25" style="max-width: 25%;"
                                            src="{{ '/images/previos_work/layout/' . $previos_work->image }}">
                                    </a>
                                </div>

                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        @if ($previos_work->status == 'active')
                                            <option value="active" selected>مفعل</option>
                                            <option value="disabled">غير مفعل</option>
                                        @else
                                            <option value="active">مفعل</option>
                                            <option value="disabled" selected>غير مفعل</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">Seo Description Ar</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder=" seo Description Ar" type="text"
                                        name="seo_description_ar"  value="{{ $previos_work->getTranslation('seo_description','ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">Seo Description En</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Seo Description En" type="text"
                                        name="seo_description_en"  value="{{ $previos_work->getTranslation('seo_description','en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">Seo Keyword Ar</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder=" Seo Keyword Ar" type="text"
                                        name="seo_keywords_ar"  value="{{ $previos_work->getTranslation('seo_keywords','ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">Seo Keyword En</label>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Seo Keyword En" type="text"
                                        name="seo_keywords_en"  value="{{ $previos_work->getTranslation('seo_keywords','en') }}">
                                </div><!-- main-form-group -->
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

 <script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })

</script>
    <!--Internal  Form-wizard js -->
    {{-- <script src="{{URL::asset('assets/admin/js/form-wizard.js')}}"></script> --}}
@endsection
