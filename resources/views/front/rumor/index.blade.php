@extends('front.layouts.master')
@section('title', @trans('rumor'))
@section('content')

    <!--Rumors area start-->
    <div class="fact-register-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="fact-register-form-area">
                        <div class="fact-register-header">
                            <img src="assets/images/logo.png" alt="Logo">
                            <h3>সত্যতা যাচাই করুন</h3>
                        </div>
                        <div class="fact-register-form">
                            <form action="{{ route('front.rumor.send') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="uname" placeholder="আপনার নাম লিখুন" class="form-control @error('uname') is-invalid @enderror" value="{{ old('uname') }}">
                                @error('uname')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="email" name="email" placeholder="আপনার ইমেইল লিখুন" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="text" name="phone" placeholder="মোবাইল নম্বর লিখুন" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="text" name="rumor_title" placeholder="গুজবের শিরোনাম" class="form-control @error('rumor_title') is-invalid @enderror" value="{{ old('rumor_title') }}">
                                @error('rumor_title')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="text" name="rumor_link_1" placeholder="গুজব লিংক ১" class="form-control" value="{{ old('rumor_link_1') }}">
                                @error('rumor_link_1')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="text" name="rumor_link_2" placeholder="গুজব লিংক ২ ( যদি থাকে ) " class="form-control">

                                <label for="image" class="form-control bg-light @error('images') is-invalid @enderror" style="cursor: pointer">গুজবের ফটো (এক বা একাধিক)</label>
                                <input type="file" name="images[]" id="image" class="form-control d-none" multiple="true">
                                @error('images')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <button type="submit" class="register-btn">সত্যতা যাচাই এর জন্য পাঠান</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Rumors area end-->

@endsection
