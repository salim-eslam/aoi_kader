@extends('layouts.dashbord.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعمال السابقه</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('previos_work.index') }}">الاعمال السابقه</a>

        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('assets/admin/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!-- row opened -->

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-info">{{ $errors->first() }}</div>
                    @endif
                    <form method="post" action="{{ route('previos_work.media.store') }}" class="needs-validation was-validated" enctype="multipart/form-data">
                        @csrf
                        <input type="text" hidden name="previos_work_id" value="{{ $previos_work->id}}">

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="type">نوع المديا</label>
                                </div>
                                <div class="col-md-10">
                                    <select name="type" id="type" class="form-control SlectBox" onchange="show()">
                                        <option value="" selected disabled>اختر نوع الميديا</option>
                                        <option value="image">صوره</option>
                                        <option value="video">فيديو</option>
                                    </select>
                                    @error('type')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="input">

                        </div>

                        <button class="btn btn-primary btn-block">حفظ</button>

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


function show(){
    input.innerHTML='';
    if (type.value=='image') {
        input.innerHTML=`
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="file">الصوره</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" multiple class="form-control" id="file" required="" name="file[]"
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                    @error('file')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                            `;
    }else{
        input.innerHTML=  `
                    <div class="form-group">
                        <div class="row">
                                <div class="col-md-3">
                                    <label for="file">الفيديو</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="file" required="" name="file"
                                        oninvalid="setCustomValidity('Please enter alphabets only. ')">
                                    @error('file')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                        </div>
                    </div>
                        `;
    }
}

</script>


@endsection

