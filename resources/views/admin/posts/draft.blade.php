@extends('admin.layouts.master')
@section('title', 'Draft Posts')
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
                            <li class="breadcrumb-item active">View Draft</li>
                        </ol>
                    </div>
                    <h4 class="page-title">View All | <a href="{{ route('admin.posts.add-new') }}" class="text-primary">Add New</a></h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Posts</h4>
                        <p class="text-muted mb-0">View Draft Posts</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Draft Posts </h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="datatable_3">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Thumbnail</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i =1; @endphp
                                                @foreach($posts as $value)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td><img src="{{$value->getFirstMediaUrl('post')}}" width="40px" height="40px" alt=""></td>
                                                        <td>{{ $value->title_bn }}</td>
                                                        <td>{{$value->categories[0]['name_bn']}}</td>
                                                        <td>
                                                            <a href="{{ route('admin.posts.edit', ['id' => $value->id ]) }}" class="btn btn-sm btn-primary"><i class="ti ti-pencil"></i> Edit</a>
                                                            <a href="{{ route('admin.posts.destroy', ['id' => $value->id]) }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            <a href="{{ route('admin.posts.publish', ['id' => $value->id]) }}" class="btn btn-sm btn-success"><i class="ti ti-file-like"></i> Publish</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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
