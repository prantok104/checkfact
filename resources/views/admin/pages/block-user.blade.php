@extends('admin.layouts.master')
@section('title', 'BLock Users')
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
                            <li class="breadcrumb-item active">Block Users</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Block Users</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title d-flex justify-content-between">BLock Users</h4>
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
                                            <a href="{{ route('admin.user.unblock', ['id' => $value->id]) }}" class="btn btn-primary btn-sm"><i class="ti ti-thumb-up"></i> Unblock</a>
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
        </div><!--end row-->
    </div><!-- container -->
@endsection
