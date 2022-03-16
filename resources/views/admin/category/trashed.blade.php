@extends('admin.layouts.master')
@section('title', 'Category Trashed')

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
                            <li class="breadcrumb-item"><a href="#">Categories</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Trashed</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Trash table | <a href="{{ route('admin.category.add-new') }}" class="text-primary">Add New Category</a></h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Categories</h4>
                        <p class="text-muted mb-0">Trashed category</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Category Trashed Table </h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="datatable_3">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Icon</th>
                                                    <th>Name</th>
                                                    <th>Slug</th>
                                                    <th>Description</th>
                                                    <th>Count</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i =1; @endphp
                                                @foreach($category as $value)
                                                    {{ $value }}
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td><p>{!! $value->icon !!}</p></td>
                                                        <td>{{ $value->name_en }}</td>
                                                        <td>{{ $value->name_bn }}</td>
                                                        <td>{{ $value->description }}</td>
                                                        <td><a href="">0</a></td>
                                                        <td>
                                                            <a href="{{ route('admin.category.restore', ['id' => $value->id ]) }}" class="btn btn-sm btn-primary"><i class="ti ti-backhoe"></i> Restore</a>
                                                            <a href="{{ route('admin.category.force-delete', ['id' => $value->id]) }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Force Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-sm btn-de-primary csv">Export CSV</button>
                                            <button type="button" class="btn btn-sm btn-de-primary sql">Export SQL</button>
                                            <button type="button" class="btn btn-sm btn-de-primary txt">Export TXT</button>
                                            <button type="button" class="btn btn-sm btn-de-primary json">Export JSON</button>
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
