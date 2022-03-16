@extends('admin.layouts.master')
@section('title', 'Add New post')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="#">Posts</a>
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
                        <h4 class="card-title">Posts</h4>
                        <p class="text-muted mb-0">Add new post</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="example-text-input" class="col-sm-3 col-form-label text-end">Title (English)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control @error('title_en') is-invalid @enderror" type="text" name="title_en" value="{{ old('title_en') }}" placeholder="Post Title" id="example-text-input">
                                                    <br>
                                                    @error('title_en')
                                                    <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="example-text-input1" class="col-sm-3 col-form-label text-end">Title (Bangla)</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control  @error('title_bn') is-invalid @enderror" type="text" name="title_bn" value="{{ old('title_bn') }}" placeholder="শিরোনাম" id="example-text-input1">
                                                    <br>
                                                    @error('title_bn')
                                                    <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="basic-conf" class="col-sm-3 col-form-label text-end">Content (English)</label>
                                                <div class="col-sm-9">
                                                    <textarea id="basic-conf" name="content_en" class="all-support  @error('content_en') is-invalid @enderror"></textarea>
                                                    <br>
                                                    @error('content_en')
                                                    <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="basic-confs" class="col-sm-3 col-form-label text-end">Content (Bangla)</label>
                                                <div class="col-sm-9">
                                                    <textarea id="basic-confs" name="content_bn" class="all-support  @error('content_bn') is-invalid @enderror"></textarea>
                                                    <br>
                                                    @error('content_bn')
                                                    <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-md-6">
                                            <div class="input-group mb-3 row">
                                                <label for="inputGroupFile02" class="col-sm-3 col-form-label text-end">Thumbnail</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="post_image" class="form-control @error('post_image') is-invalid @enderror" id="inputGroupFile02">
                                                    <br>
                                                    @error('post_image')
                                                    <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 row">
                                                <label for="example-text-input-lg" class="col-sm-3 col-form-label text-end">Category</label>
                                                <div class="col-sm-9">
                                                    <select name="category" id="example-text-input-lg" class="form-control @error('category') is-invalid @enderror text-capitalize">
                                                        <option value="">--- Select category ---</option>
                                                        @foreach($category as $value)
                                                            <option value="{{$value->id}}">{{$value->name_en}} <span class="text-muted">({{ $value->name_bn }})</span></option>
                                                        @endforeach
                                                    </select>
                                                    <br>
                                                    @error('category')
                                                    <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <div class="col-sm-9 m-auto">
                                            <button class="btn btn-primary" name="post" value="1">Publish</button>
                                            <button class="btn btn-primary" name="post" value="2">Draft</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->

    </div><!-- container -->
@endsection
@push('script')
    <script src="{{asset('admin/assets/plugins/tinymce/tinymce.min.js')}}"></script>

    <script>
        var editor_config ={
            path_absolute: "/",
            selector: '#basic-conf, .all-support',
            height: 400,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code save fullscreen insertdatetime media nonbreaking',
                'table emoticons template paste help'
            ],
            toolbar: 'undo redo  | link image | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
            relative_urls: false,
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{route("admin.posts.image.upload")}}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function () {
                    var json_data;
                    if (xhr.status != 200){
                        failure('HTTP Error :' + xhr.status);
                        return;
                    }
                    json_data = JSON.parse(xhr.responseText);
                    console.log(json_data)

                    if (!json_data || typeof json_data.location != "string"){
                        failure('Invalid JSON' + xhr.responseText);
                        return;
                    }
                    success(json_data.location);
                };
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
                xhr.send(formData);
            }
        };
        tinymce.init(editor_config);
    </script>
@endpush
