@extends('layouts.dashbord.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">إضافه تعليق</h4>
            </div>
        </div>
        {{-- <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('messages.index') }}">عرض الرسائل</a>

        </div> --}}
    </div>
    <!-- breadcrumb -->
@endsection
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

@endsection

@section('content')
    <!-- row opened -->

 @if (session()->has('Add'))
 <script>
     window.onload = function() {
         notif({
             msg: " تم اضافة القسم بنجاح",
             type: "success"
         });
     }

 </script>
@endif

@if (session()->has('edit'))
 <script>
     window.onload = function() {
         notif({
             msg: " تم تحديث بيانات القسم بنجاح",
             type: "success"
         });
     }

 </script>
@endif

@if (session()->has('delete'))
 <script>
     window.onload = function() {
         notif({
             msg: " تم حذف القسم بنجاح",
             type: "error"
         });
     }

 </script>
@endif


    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-info">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form method="post" action="{{ route('comment.store') }}" class="needs-validation was-validated">
                        @csrf
                        <div class="row row-xs formgroup-wrapper">

                            <input class="form-control" type="text" name="previos_work_id" style="display: none" value="{{ $previos_work_id }}">
                            <div class="col-md-6">
                                <label class="form-label h5">الاسم باللغه العربيه</label>
                                <div class="form-group">
                                    <input required class="form-control" placeholder="ادخل الاسم باللغه العربيه" type="text"
                                        name="name_ar">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">الاسم باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input required class="form-control" placeholder="ادخل الاسم باللغه الانجليزيه" type="text"
                                        name="name_en">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6">
                                <label class="form-label h5">المنصب باللغه العربيه</label>
                                <div class="form-group">
                                    <input required class="form-control" placeholder="ادخل المنصب باللغه العربيه" type="text"
                                        name="role_ar">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-label h5">المنصب باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <input required class="form-control" placeholder="ادخل المنصب باللغه الانجليزيه" type="text"
                                        name="role_en">
                                </div><!-- main-form-group -->
                            </div>
                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">التعليق باللغه العربيه</label>
                                <div class="form-group">
                                    <textarea required id="comment_ar" name="comment_ar" class="form-control" placeholder="الوصف (عربي)"
                                        rows="5"></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mg-t-20 mg-md-t-0">
                                <label class="form-lable h5" for="status">التعليق باللغه الانجليزيه</label>
                                <div class="form-group">
                                    <textarea required id="comment_en" name="comment_en" class="form-control" placeholder="الوصف (انجليزي)"
                                        rows="5"></textarea>
                                </div>
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
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive hoverable-table">
                        <table class="table table-hover  text-md-nowrap" id="example1" data-page-length='50' style=" text-align: center;">
                            <thead>
                                <tr>
                                    <th class="wd-10p border-bottom-0">#</th>
                                    <th class="wd-15p border-bottom-0">الاسم </th>
                                    <th class="wd-15p border-bottom-0">الوظيفه</th>
                                    <th class="wd-15p border-bottom-0">التعليق</th>
                                    <th class="wd-15p border-bottom-0">الحاله</th>

                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($comments as $comment)
                                    <tr>
                                        <td>{{ $comment->id }}</td>
                                        <td>{{ $comment->getTranslation('name', 'ar')  }}</td>
                                        <td>{!! $comment->getTranslation('role', 'ar')  !!}</td>
                                        <td>{!! $comment->getTranslation('comment', 'ar') !!}</td>


                                        <td>
                                            @if ($comment->status == 'active')
                                                <span class="label text-success  d-flex  " style="margin-right: 50px;">
                                                    <div class="dot-label bg-success "></div>مفعل
                                                </span>
                                            @else
                                                <span class="label text-danger  d-flex " style="margin-right: 50px;">
                                                    <div class="dot-label bg-danger "></div>غير مفعل
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                                <a href="{{ route('comment.edit',['comment'=>$comment->id]) }}" class="btn btn-sm btn-info"
                                                    title="تعديل"><i class="las la-pen"></i></a>

                                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-user_id="{{ $comment->id }}" data-username="{{ $comment->getTranslation('name', 'ar') }}"
                                                    data-toggle="modal" href="#modaldemo8" title="حذف"><i class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->

        <!-- Modal effects -->
        <div class="modal" id="modaldemo8">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">حذف العمل السابق</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('comment.destroy',0) }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="comment_id" id="user_id" value="">
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
    </div>

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
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



@endsection

