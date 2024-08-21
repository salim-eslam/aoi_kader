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
                <h4 class="content-title mb-0 my-auto">تعديل الاعدادات</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('settings.index') }}">جميع  الاعدادات</a>

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

                    <form id="formData" method="post" action="{{ route('settings.update',$setting->id) }}"
                    class="needs-validation " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-xs formgroup-wrapper">

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  email</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="  site email " type="text"
                                    name="site_email"  value="{{ $setting->site_email }}">
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  phone</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="site phone   " type="text"
                                    name="site_phone"  value="{{ $setting->site_phone }}">
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  address</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="  site address " type="text"
                                    name="site_address"  value="{{ $setting->site_address }}">
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  fax</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="site fax   " type="text"
                                    name="site_fax"  value="{{ $setting->site_fax }}">
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  map</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="  site map " type="text"
                                    name="site_map"  value="{{ $setting->site_map }}">
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  facebook link</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="site facebook link   " type="text"
                                    name="site_facebook"  value="{{ $setting->site_facebook }}">
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">  youtube link</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="site youtube link   " type="text"
                                    name="site_youtube"  value="{{ $setting->site_youtube }}">
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
    {{-- </div> --}}
    <!-- breadcrumb -->

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
