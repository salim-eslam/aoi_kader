@extends('layouts.dashbord.master')
@section('css')

@section('title')
    الاقسام
@stop

<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/admin/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل التعليق </h4>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection

@if (session()->has('edit'))
{{-- @dd(1) --}}
    <script>
        window.onload = function() {
            notif({
                msg: " تم تحديث بيانات القسم بنجاح",
                type: "success"
            });
        }

    </script>
@endif

@section('content')
    <!-- row opened -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif

                    <form id="formData" method="post" action="{{ route('comment.update', $comment) }}"
                        class="needs-validation " enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row row-xs formgroup-wrapper">
                            <input class="form-control" type="text" name="previos_work_id" style="display: none" value="{{$comment->previos_work_id }}">

                            <div class="col-md-6">
                                <label class="form-label h5">الاسم باللغه العربيه</label>
                                <div class="form-group">
                                    <input  required class="form-control" placeholder="ادخل الاسم باللغه العربيه" type="text"
                                        name="name_ar" value="{{ $comment->getTranslation('name', 'ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">الاسم باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input required  class="form-control" placeholder="ادخل الاسم باللغه الانجليزيه" type="text"
                                        name="name_en" value="{{ $comment->getTranslation('name', 'en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">المسمي الوظيفي باللغه العربيه</label>
                                <div class="form-group">
                                    <input required  class="form-control" placeholder="ادخل المسمي الوظيفي باللغه العربيه" type="text"
                                        name="role_ar" value="{{ $comment->getTranslation('role', 'ar') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">المسمي الوظيفي باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input required  class="form-control" placeholder="ادخل المسمي الوظيفي باللغه الانجليزيه" type="text"
                                        name="role_en" value="{{ $comment->getTranslation('role', 'en') }}">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">التعليق باللغه العربيه</label>
                                <div class="form-group">
                                    <textarea id="comment_ar"  required name="comment_ar" class="form-control" placeholder="Textarea" rows="5">
                                        {!! $comment->getTranslation('comment', 'ar') !!}

                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">التعليق باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <textarea id="comment_en" name="comment_en" class="form-control" placeholder="Textarea" rows="5">
                                        {!! $comment->getTranslation('comment', 'en') !!}

                                    </textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">حاله القسم</label>
                                <div class="form-group">
                                    <select class="form-control select2-search" id="status" name="status">
                                        @if ($comment->status == 'active')
                                            <option value="active" selected>مفعل</option>
                                            <option value="disabled">غير مفعل</option>
                                        @else
                                            <option value="active">مفعل</option>
                                            <option value="disabled" selected>غير مفعل</option>
                                        @endif
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
<!--Internal  Select2 js -->
<script src="{{URL::asset('assets/admin/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('assets/admin/js/form-layouts.js')}}"></script>
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
<script>
    ClassicEditor
        .create(document.querySelector('#comment_ar'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#comment_en'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>

<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/admin/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/admin/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/admin/js/modal.js') }}"></script>

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



@endsection
