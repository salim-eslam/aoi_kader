@extends('layouts.dashbord.master')

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">تعديل الكتالوج</h4>
            </div>
        </div>
        <div class="d-flex my-xl-auto right-content">
            <a class="btn btn-primary btn-block" href="{{ route('cataloges.index') }}">الكتالوجات</a>

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
                <form method="post" action="{{ route('cataloges.update',$catalog->id) }}" class="needs-validation " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row row-xs formgroup-wrapper">
                        <div class="col-md-6">
                            <label class="form-label h5">العنوان باللغه العربيه</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="ادخل العنوان باللغه العربيه" type="text"
                                    name="title_ar" value="{{ $catalog->getTranslation('title', 'ar')  }}">
                            </div><!-- main-form-group -->
                        </div>
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-label h5">العنوان باللغه الانجليزيه</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="ادخل العنوان باللغه الانجليزيه" type="text"
                                    name="title_en" value="{{ $catalog->getTranslation('title', 'en')  }}">
                            </div><!-- main-form-group -->
                        </div>

                        <div class="col-md-6">
                            <label class="form-label h5">اضافه الصوره</label>
                            <div class="form-group">
                                <input class="form-control" placeholder="قم برفع الصوره" type="file"
                                    name="file">
                            </div><!-- main-form-group -->
                            <a type="file"  class="btn btn-sm btn-info" target="_blank" href="{{'/files/cataloges/'.$catalog->file}}">
                                <i class="las la-eye"></i>
                            </a>
                        </div>
                        <div class="col-md-6 mg-t-20 mg-md-t-0">
                            <label class="form-lable h5" for="status">حاله العرض</label>
                            <div class="form-group">
                                <select class="form-control select2-search" id="status" name="status">
                                    @if ($catalog->status=='active')
                                    <option value="active" selected>مفعل</option>
                                    <option value="disabled" >غير مفعل</option>

                                    @else
                                    <option value="active" >مفعل</option>
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
