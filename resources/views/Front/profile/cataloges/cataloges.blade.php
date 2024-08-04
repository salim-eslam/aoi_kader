@extends('layouts.front.master')

@section('content')
    <div class="breadcrumbs_area" style="background: transparent">

    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">{{ trans('cataloges.catalogues') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{-- <h4 class="text-center mb-4">Create Your Domain Name</h4> --}}
                    <div class="table-wrap">
                        <table class="table table-responsive ">
                            <thead class="thead-primary">
                                {{-- <tr>
                                    <th>{{ trans('cataloges.title') }}</th>
                                    <th>{{ trans('cataloges.show') }}</th>
                                </tr> --}}
                            </thead>
                            <tbody>
                                @foreach ($cataloges as $catalog)
                                    <tr>
                                        <td style="max-width: 50px">{{ $catalog->title }}</td>
                                        {{-- <td><a href="#" class="btn btn-primary">Sign Up</a></td> --}}
                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#exampleModel{{ $catalog->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                  </svg>
                                            </button>

                                            <a class="btn btn-info"  style="color: white" href="{{ '/files/cataloges/' . $catalog->file }}"
                                                download><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
                                                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                                  </svg></a>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModel{{ $catalog->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="max-width: 800px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{ $catalog->title }}
                                                        </h5>
                                                        <button type="button" class="btn-close marginRight"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed src="{{ '/files/cataloges/' . $catalog->file }}"
                                                            type="application/pdf" width="100%" height="600px" />
                                                    </div>
                                                    {{-- <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
@endsection
