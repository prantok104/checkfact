@extends('admin.layouts.master')
@section('title', 'Rumor Lists')

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
                            <li class="breadcrumb-item"><a href="#">Rumors</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Lists</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Rumors All</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rumors</h4>
                        <p class="text-muted mb-0">View All Rumor</code>.
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">All Rumors </h4>
                                    </div><!--end card-header-->
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="datatable_3">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Sender Name</th>
                                                    <th>Sender Phone</th>
                                                    <th>Sender Email</th>
                                                    <th>Date</th>
                                                    <th>Rumor Title</th>
                                                    <th>Rumor Link</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $i = 1; @endphp
                                                @foreach($rumors as $value)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $value->sender_name }}</td>
                                                        <td>{{ $value->phone }}</td>
                                                        <td><a href="mailto:{{ $value->sender_email }}">{{ $value->sender_email }}</a></td>
                                                        <td>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</td>
                                                        <td>{{ $value->rumor_title }}</td>
                                                        <td><a href="{{ $value->rumor_link_one }}" target="_blank" class="btn btn-primary"><i class="ti ti-eye-check"></i></a></td>
                                                        <td>
                                                            <a href="{{ route('admin.rumor.view',['id' => $value->id]) }}" class="btn btn-warning"><i class="ti ti-eye"></i></a>
                                                            @if($value->status == 0)
                                                            <a href="{{ route('admin.rumor.send-mail',['type'=> 'received', 'id' => $value->id]) }}" class="btn btn-primary"><i class="ti ti-bell"></i> Notify</a>
                                                            @endif

                                                            @if($value->status == 1)
                                                            <a href="{{ route('admin.rumor.send-mail',['type'=> 'processed', 'id' => $value->id]) }}" class="btn btn-blue"><i class="ti ti-receipt"></i> Process</a>
                                                            @endif

                                                            @if($value->status == 2)
                                                            <a href="{{ route('admin.rumor.send-mail',['type'=> 'done', 'id' => $value->id]) }}" class="btn btn-success"><i class="ti ti-thumb-up"></i> Complete</a>
                                                            @endif

                                                            @if($value->status == 3)
                                                                <button class="btn btn-success">Completed</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @endforeach
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
