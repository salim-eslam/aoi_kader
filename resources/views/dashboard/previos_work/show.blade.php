@extends('layouts.dashbord.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

    <style>
        iframe {
            max-width: 100% !important;
            height: 200% !important;
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
            </div>
        </div>
        @can('previosWork-list')
            <div class="d-flex my-xl-auto right-content">
                <a class="btn btn-primary btn-block" href="{{ route('previos_work.index') }}">الاعمال السابقه</a>
            </div>
        @endcan

    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <div class="row">

        <div class="col-12 col-md-6">
            <div class="card card-primary">
                <div class="card-header pb-0">
                    <h3 class=" mb-0 pb-0"> {{ $previos_work->id }}
                    </h3>
                </div>
                <div class="card-body ">
                    <div class="form-group">
                        <strong>اسم الباقه : </strong>
                        {{ $previos_work->package->name }}
                    </div>
                    <div class="form-group">
                        <strong>الواجهه : </strong>
                        <a type="image" target="_blank"
                            href="{{ '/images/previos_work/layouts/' . $previos_work->layout }}">
                            <img class="rounded float-start h-25" style="max-width: 25%;"
                                src="{{ '/images/previos_work/layouts/' . $previos_work->layout }}">
                        </a>
                    </div>


                </div>
                <div class="card-footer">
                    <div class="btn-icon-list">
                        @can('previosWork-edit')
                            <form action="{{ route('previos_work.edit', $previos_work['id']) }}" class="mr-3">
                                <button class="btn btn-success">Edit</button>
                            </form>
                        @endcan
                        @can('previosWork-delete')
                            <form action="{{ route('previos_work.destroy', $previos_work['id']) }}" method="POST"
                                class="mr-3">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        @endcan

                        <div class="d-flex my-xl-auto mr-1 right-content">
                            <a class="btn btn-primary btn-block"
                                href="{{ route('previos_work_file_add', $previos_work->id) }}">اضافه مديا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row opened -->


    <div class="col-xl-12">
        <div class="card mg-b-20">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>

                                <th class="wd-15p border-bottom-0">الصوره</th>
                                <th class="wd-15p border-bottom-0">المديا</th>

                                <th class="wd-10p border-bottom-0">الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($previos_work->files as $file)
                                @if ($file->type == 'image')
                                    <tr>
                                        <td>{{ $file->id }}</td>
                                        <td>
                                            <a type="image" target="_blank"
                                                href="{{ '/images/previos_work/images/' . $file->file }}">
                                                <img class="rounded float-start h-25" style="max-width: 25%;"
                                                    src="{{ '/images/previos_work/images/' . $file->file }}">
                                            </a>
                                        </td>
                                        <td>{{ $file->type }}</td>

                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- <form action="{{ route('teachers.edit', $teacher->id) }}"
                                                    class="ml-2 mr-2">
                                                    <button class="btn btn-success"><i
                                                            class="typcn typcn-edit"></i></button>
                                                </form> --}}
                                                <form action="{{ route('previos_work_image_delete', [$file->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <td>{{ $file->id }}</td>
                                        <td>
                                            {!! $file->file !!}
                                        </td>
                                        <td>{{ $file->type }}</td>
                                        <td>
                                            <div class="btn-icon-list">
                                                {{-- <form action="{{ route('teachers.edit', $teacher->id) }}"
                                                class="ml-2 mr-2">
                                                <button class="btn btn-success"><i
                                                        class="typcn typcn-edit"></i></button>
                                            </form> --}}
                                                <form action="{{ route('previos_work_image_delete', [$file->id]) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{--
    </div>
    <!-- Container closed -->
    </div> --}}
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
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/admin/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/admin/js/table-data.js') }}"></script>
@endsection
