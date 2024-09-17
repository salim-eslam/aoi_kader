@extends('layouts.dashbord.master')
@section('css')

@section('title')
    ميديا
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
            <h4 class="content-title mb-0 my-auto">ميديا</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                ميديا</span>
        </div>
    </div>
    {{-- @can('media-create') --}}

    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('medias.create') }}">اضافه ميديا</a>
    </div>
    {{-- @endcan --}}
</div>
<!-- breadcrumb -->
@endsection

@section('content')


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


<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="col-sm-1 col-md-2">
                    @can('اضافة مستخدم')
                        <a class="btn btn-primary btn-sm" href="{{ route('medias.create') }}">اضافة media</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive hoverable-table">
                    <table class="table table-hover  text-md-nowrap" id="example1" data-page-length='50'
                        style=" text-align: center;">
                        <thead>
                            <tr>
                                <th class="wd-10p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">الصوره</th>
                                <th class="wd-15p border-bottom-0">العنوان الرئيسي</th>
                                {{-- <th class="wd-15p border-bottom-0">المحتوي</th> --}}

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medias as $media)
                                <tr>
                                    <td>{{ $media->id }}</td>
                                    @if ($media->type == 'video')
                                        <td>
                                            <iframe width="150" height="150" src="{{ $media->file }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </td>
                                    @else
                                        <td>
                                            <a type="image" target="_blank"
                                                href="{{ '/images/media/' . $media->file }}">
                                                <img class="rounded float-start h-25" style="max-width: 25%;"
                                                    src="{{ '/images/media/' . $media->file }}">
                                            </a>
                                        </td>
                                    @endif



                                    <td>{{ $media->getTranslation('title', 'ar') }}</td>
                                    {{-- <td>{{ $media->getTranslation('body', 'ar')  }}</td> --}}

                                    <td>
                                        @if ($media->status == 'active')
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
                                        {{-- @can('media-edit') --}}

                                        <a href="{{ route('medias.edit', $media->id) }}" class="btn btn-sm btn-info"
                                            title="تعديل"><i class="las la-pen"></i></a>
                                        {{-- @endcan --}}
                                        {{-- @can('media-delete') --}}

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                            data-user_id="{{ $media->id }}" data-username="{{ $media->name }}"
                                            data-toggle="modal" href="#modaldemo8" title="حذف"><i
                                                class="las la-trash"></i></a>
                                        {{-- @endcan --}}
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
                    <h6 class="modal-title">حذف</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('medias.destroy', 0) }}" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="media_id" id="user_id" value="">
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
<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
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
