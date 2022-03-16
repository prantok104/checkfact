@extends('admin.layouts.master')
@section('title', 'Subscriber Lists')

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="#">Posts</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Subscriber All</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Subscriber All</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subscribers</h4>
                        <p class="text-muted mb-0">View All Subscriber</code>.
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
                                                    <th>Email</th>
                                                    <th>Subscription Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i =1; @endphp
                                                @foreach($subscriber as $value)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</td>
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
