@extends('admin.layouts.master')
@section('title', 'Add Video')

@push('style')
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables/datatable.css')}}">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="#">Videos</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Add New</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add New</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Videos</h4>
                        <p class="text-muted mb-0">Add new video</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-3">
                                <form action="{{ route('admin.video.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Youtube Video ID</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('ytLink') is-invalid @enderror" type="text" name="ytLink" value="{{ old('ytLink') }}" id="example-text-input">
                                            <br>
                                            @error('ytLink')
                                            <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Title (En)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('title_en') is-invalid @enderror" type="text" name="title_en" value="{{ old('title_en') }}" id="example-text-input">
                                            <br>
                                            @error('title_en')
                                            <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input1" class="col-sm-3 col-form-label text-end">Title (Bn)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control  @error('title_bn') is-invalid @enderror" type="text" name="title_bn" value="{{ old('title_bn') }}" id="example-text-input1">
                                            <br>
                                            @error('title_bn')
                                            <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group mb-3 row">
                                        <label for="inputGroupFile02" class="col-sm-3 col-form-label text-end">Thumbnail</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="video_thumb" class="form-control @error('video_thumb') is-invalid @enderror" id="inputGroupFile02">
                                            <br>
                                            @error('video_thumb')
                                            <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                            <button class="btn btn-primary">Add New Video</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Videos Table </h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="datatable_3">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Thumbnail</th>
                                                    <th>Video ID</th>
                                                    <th>Name En.</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i =1; @endphp
                                                @foreach($videos as $video)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td><img src="{{$video->getFirstMediaUrl('video')}}" alt="" width="50px" height="50px"></td>
                                                        <td><p>{{$video->video_link}}</p></td>
                                                        <td>{{ $video->title_en }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.video.edit', ['id' => $video->id ]) }}" class="btn btn-sm btn-primary"><i class="ti ti-pencil"></i> Edit</a>
                                                            <a href="{{ route('admin.video.destroy', ['id' => $video->id]) }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                                            <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->

    </div><!-- container -->
@endsection

@push('script')
    <script src="{{asset('admin/assets/plugins/datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('admin/assets/pages/datatable.init.js')}}"></script>
@endpush
