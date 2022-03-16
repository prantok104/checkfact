@extends('admin.layouts.master')
@section('title', 'Users')
@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">CheckFact</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item"><a href="#">Dashboard</a>
                            </li><!--end nav-item-->
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Users</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title d-flex justify-content-between">Users</h4>
                            </div><!--end col-->
                        </div>  <!--end row-->
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive browser_users">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Phone</th>
                                    <th class="border-top-0">Gender</th>
                                    <th class="border-top-0">Registered</th>
                                    <th class="border-top-0">Action</th>
                                </tr><!--end tr-->
                                </thead>
                                <tbody>
                                    @php $i = 1;
                                    $gender = [
                                            '1' => 'Male',
                                            '2' => 'Female',
                                            '3' => 'Other'
                                        ];
                                    @endphp
                                    @foreach($users as $value)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>
                                                @foreach($gender as $key=>$values)
                                                    @if($key == $value->gender)
                                                        {{ $values }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.block', ['id' => $value->id]) }}" class="btn btn-danger btn-sm"><i class="ti ti-eraser"></i> Block</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table> <!--end table-->

                            {{ $users->links('pagination::bootstrap-4') }}

                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
            <div class="col-md-6 col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h4 class="card-title d-flex justify-content-between">User Status</h4>
                                </div><!--end col-->
                            </div>  <!--end row-->
                        </div><!--end card-header-->
                        <div class="table-responsive browser_users">
                            <table class="table table-hover mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Status</th>
                                </tr><!--end tr-->
                                </thead>
                                <tbody>
                                @php $i = 1 @endphp
                                @foreach($users as $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            @if($value->isOnline())
                                                <small class="text-success d-flex align-items-center"> <span style="display: inline-block; width: 5px; height: 5px; border: 1px solid green; border-radius: 50%; margin-right: 2px; background: green"></span> Online</small>
                                            @else
                                                <small class="text-muted d-flex align-items-center"> <span style="display: inline-block; width: 5px; height: 5px; border: 1px solid gray; border-radius: 50%; margin-right: 2px; background: gray"></span> Offline</small>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table> <!--end table-->

                            {{ $users->links('pagination::bootstrap-4') }}

                        </div><!--end /div-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->
    </div><!-- container -->
@endsection
