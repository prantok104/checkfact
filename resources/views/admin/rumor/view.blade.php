@extends('admin.layouts.master')
@section('title', 'Rumor')

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
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Rumors ( {{ $rumor[0]->rumor_title }} )</h4>
                </div><!--end page-title-box-->
            </div><!--end col-->
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Rumors ( {{ \Carbon\Carbon::createFromDate($rumor[0]->created_at)->diffForHumans() }} )</h4>
                        </p>
                    </div><!--end card-header-->
                    <div class="card-body">
                        <div class="row justify-content-between">
                            <div class="col-lg-8">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Name: </th>
                                            <td>{{ $rumor[0]->sender_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email: </th>
                                            <td><a href="mailto:{{ $rumor[0]->sender_email }}">{{ $rumor[0]->sender_email }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Phone: </th>
                                            <td><a href="tel:{{ $rumor[0]->sender_phone }}">{{ $rumor[0]->sender_phone }}</a></td>
                                        </tr>
                                        <tr>
                                            <th>Title: </th>
                                            <td>{{ $rumor[0]->rumor_title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Link 1: </th>
                                            <td><a href="{{ $rumor[0]->rumor_link_one }}" class="btn btn-primary"><i class="ti ti-eye"></i> Visit Link</a></td>
                                        </tr>
                                        <tr>
                                            <th>Link 2: </th>
                                            <td><a href="{{ $rumor[0]->rumor_link_two }}" class="btn btn-primary" ><i class="ti ti-eye"></i> Visit Link</a></td>
                                        </tr>
                                        <tr>
                                            <th>Send: </th>
                                            <td>{{ \Carbon\Carbon::createFromDate($rumor[0]->created_at)->diffForHumans() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Images</h4>
                                    </div>
                                    @php $count = count($files) @endphp
                                    @for($i =0; $i< $count; $i++)
                                        <img src="{{ $files[$i]['file'] }}" alt="" width="260px" class="mb-2">
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div><!--end card-body-->
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->

    </div><!-- container -->
@endsection
