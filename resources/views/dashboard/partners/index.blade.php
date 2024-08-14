@extends('layouts.dashbord.master')
@section('css')

@section('title')
شركاء النجاح
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
            <h4 class="content-title mb-0 my-auto">الشركاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                الشركاء</span>
        </div>
    </div>
    <div class="d-flex my-xl-auto right-content">
        <a class="btn btn-primary btn-block" href="{{ route('partners.create') }}">اضافه شريك</a>
    </div>
</div>
<!-- breadcrumb -->
@endsection

@section('content')
{{--
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif --}}

@if (session()->has('Add'))
<script>
    window.onload = function() {
            notif({
                msg: " تم اضافة الشريك بنجاح",
                type: "success"
            });
        }

</script>
@endif

@if (session()->has('edit'))
<script>
    window.onload = function() {
            notif({
                msg: " تم تحديث بيانات الشريك بنجاح",
                type: "success"
            });
        }

</script>
@endif

@if (session()->has('delete'))
<script>
    window.onload = function() {
            notif({
                msg: " تم حذف الشريك بنجاح",
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
                    @can('اضافة شريك')
                    <a class="btn btn-primary btn-sm" href="{{ route('partners.create') }}">اضافة شريك</a>
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
                                <th class="wd-15p border-bottom-0">اسم الشريك</th>
                                <th class="wd-15p border-bottom-0">صورة الشريك</th>
                                <th class="wd-15p border-bottom-0">حالة الشريك</th>
                                <th class="wd-10p border-bottom-0">العمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($partners->count()>0)
                            @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $partner->getTranslation('title', 'ar')}}</td>
                                <td>
                                    <a type="image" target="_blank"
                                        href="{{asset('images/partners/'.$partner->image )}}">
                                        <img class="rounded float-start h-50" style="max-width: 50%;"
                                            src="{{asset('images/partners/'.$partner->image )}}">
                                    </a>
                                </td>
                                <td>
                                    @if ($partner->status == 'active')
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
                                    <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-sm btn-info"
                                        title="تعديل"><i class="las la-pen"></i></a>

                                    <!-- Trigger Modal -->
                                    <a class="btn btn-sm btn-danger" data-effect="effect-scale"
                                        data-user_id="{{ $partner->id }}" data-username="{{ $partner->name }}"
                                        data-toggle="modal" href="#modaldemo8" title="حذف">
                                        <i class="las la-trash"></i>
                                    </a>

                                    <!-- Modal Structure -->
                                    <div class="modal" id="modaldemo8">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">حذف الشريك</h6>
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="deleteForm" action="{{route('partners.destroy',0)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body">
                                                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                        <input type="hidden" name="user_id" id="user_id" value="">
                                                        <input class="form-control" name="username" id="username"
                                                            type="text" readonly>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">الغاء</button>
                                                        <button type="submit" class="btn btn-danger">تاكيد</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                            @endforeach

                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/div-->

    <!-- Modal effects -->
    {{-- <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">حذف الشريك</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="deletePartnerForm" method="POST">
                    @method('DELETE')
                    @csrf
                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="partner_id" id="user_id" value="">
                        <input class="form-control" name="username" id="username" type="text" readonly>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-danger">تاكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

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
    $(document).ready(function() {
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var userId = button.data('user_id');
        var username = button.data('username');
        var modal = $(this);

        // Populate modal fields
        modal.find('.modal-body #user_id').val(userId);
        modal.find('.modal-body #username').val(username);

        // Set form action
        var formAction = '{{ route("partners.destroy", ":id") }}';
        formAction = formAction.replace(':id', userId);
        modal.find('#deleteForm').attr('action', formAction);
    });
});
</script>


@endsection
