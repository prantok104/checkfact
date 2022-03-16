@extends('admin.layouts.master')
@section('title', 'Video Trashed')

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
                            <li class="breadcrumb-item active">Trashed</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Videos table | <a href="{{ route('admin.video.add-new') }}" class="text-primary">Add New Video</a></h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Videos</h4>
                        <p class="text-muted mb-0">Trashed video</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
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
                                                            <a href="{{ route('admin.video.restore', ['id' => $video->id ]) }}" class="btn btn-sm btn-primary"><i class="ti ti-thumb-up"></i> Restore</a>
                                                            <a href="{{ route('admin.video.force.delete', ['id' => $video->id]) }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i>Force Delete</a
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$videos->links('pagination::bootstrap-4')}}

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
