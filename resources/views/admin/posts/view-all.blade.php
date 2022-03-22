@extends('admin.layouts.master')
@section('title', 'View All Posts')
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
                            <li class="breadcrumb-item active">View All</li>
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
                        <p class="text-muted mb-0">View All Posts</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Posts </h4>
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
                                                    <tr  class=" {{ ($value->fixed_hero == '1') ? 'bg-soft-primary' :  '' }} bg-">
                                                        <td>{{ $i++ }}</td>
                                                        <td><img src="{{$value->getFirstMediaUrl('post')}}" width="40px" height="40px" alt=""></td>
                                                        <td>{{ $value->title_bn }}</td>
                                                        <td>{{$value->categories[0]['name_bn']}}</td>
                                                        <td>
                                                            <a href="{{ route('admin.posts.edit', ['id' => $value->id ]) }}" class="btn btn-sm btn-primary"><i class="ti ti-pencil"></i> Edit</a>
                                                            <a href="{{ route('admin.posts.destroy', ['id' => $value->id]) }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Delete</a>
                                                            <a href="{{ route('admin.posts.draft', ['id' => $value->id]) }}" class="btn btn-sm btn-warning"><i class="ti ti-database"></i> Draft</a>
                                                            <a href="{{ route('admin.posts.pin', ['id' => $value->id]) }}" class="btn btn-sm btn-success"><i class="ti ti-pin"></i> {{ ($value->fixed_hero == '1') ? 'Pined' :  'Pin' }}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $posts->links('pagination::bootstrap-4') }}
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
