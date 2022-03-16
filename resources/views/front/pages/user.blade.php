@extends('front.layouts.master')
@section('title', @trans('profile'))
@section('content')
    <div class="profile-area-start mt-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 shadow-sm">
                        <div class="card-body">
                            Welcome: {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
