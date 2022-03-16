@extends('admin.layouts.master')
@section('title', 'Add Category')

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
                        <h4 class="card-title">Categories</h4>
                        <p class="text-muted mb-0">Add new category</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-3">
                                <form action="{{ route('admin.category.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-sm-3 col-form-label text-end">Name (En)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control @error('category_name_en') is-invalid @enderror" type="text" name="category_name_en" value="{{ old('category-name-en') }}" placeholder="Category name" id="example-text-input">
                                            <br>
                                            @error('category_name_en')
                                                <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input1" class="col-sm-3 col-form-label text-end">Name (Bn)</label>
                                        <div class="col-sm-9">
                                            <input class="form-control  @error('category_name_bn') is-invalid @enderror" type="text" name="category_name_bn" value="{{ old('category-name-bn') }}" placeholder="ক্যাটাগরি নাম" id="example-text-input1">
                                            <br>
                                            @error('category_name_bn')
                                            <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input-lg" class="col-sm-3 col-form-label text-end">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" cols="30" rows="3" id="example-text-input-lg" class="form-control"></textarea>
                                        </div>
                                    </div>
{{--                                    <div class="input-group mb-3 row">--}}
{{--                                        <label for="inputGroupFile02" class="col-sm-3 col-form-label text-end">Image</label>--}}
{{--                                        <div class="col-sm-9">--}}
{{--                                            <input type="file" name="category_image" class="form-control" id="inputGroupFile02">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                    <div class="mb-3 row">
                                        <label for="example-text-input-sm" class="col-sm-3 col-form-label text-end">Icon</label>
                                        <div class="col-sm-9">
                                            <input class="form-control  @error('category_icon') is-invalid @enderror" name="category_icon" type="text" placeholder="<i class='fa fa-user'></i>" id="example-text-input-sm">
                                            <br>
                                            @error('category_icon')
                                            <div class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input-sm" class="col-sm-3 col-form-label text-end"></label>
                                        <div class="col-sm-9">
                                            <a href="https://fontawesome.com/v5/search" class="text-decoration-underline" target="_blank">Get the category icon</a>
                                        </div>

                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-3"></label>
                                        <div class="col-sm-9">
                                           <button class="btn btn-primary">Add New Category</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Category Table </h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="datatable_3">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Icon</th>
                                                        <th>Name En.</th>
                                                        <th>Name Bn.</th>
                                                        <th>Slug</th>
                                                        <th>Description</th>
                                                        <th>Count</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $i =1; @endphp
                                                    @foreach($parent_category as $category)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td><p>{!! $category->icon !!}</p></td>
                                                        <td>{{ $category->name_en }}</td>
                                                        <td>{{ $category->name_bn }}</td>
                                                        <td>{{ $category->slug_en }}</td>
                                                        <td>{{ $category->description }}</td>
                                                        <td><a href="">0</a></td>
                                                        <td>
                                                            <a href="{{ route('admin.category.edit', ['id' => $category->id ]) }}" class="btn btn-sm btn-primary"><i class="ti ti-pencil"></i> Edit</a>
                                                            <a href="{{ route('admin.category.destroy', ['id' => $category->id]) }}" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Delete</a>
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
