@extends('front.layouts.master')
@section('title', @trans('register'))
@section('content')

    <!--Register area start-->
    <div class="fact-register-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="fact-register-form-area">
                        <div class="fact-register-header">
                            <img src="assets/images/logo.png" alt="Logo">
                            <h3>নিবন্ধন ফরম</h3>
                        </div>
                        <div class="fact-register-form">
                            <form action="{{ route('register') }}" method="POST" autocomplete="off">
                                @csrf
                                <input type="text" name="uname" placeholder="আপনার নাম লিখুন" class="form-control @error('uname') is-invalid @enderror" value="{{ old('uname') }}" autofocus="off" autocomplete="off">
                                @error('uname')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="email" name="email" placeholder="আপনার ইমেইল লিখুন" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                @error('email')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="text" name="phone" placeholder="মোবাইল নম্বর লিখুন" class="form-control @error('email') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <p>লিঙ্গ :
                                    <input type="radio" name="gender" id="male" value="1"><label for="male" class="ml-1">পুরুষ</label>
                                    <input type="radio" name="gender" id="female" value="2" class="ml-3"><label for="female" class="ml-1">মহিলা</label>
                                    <input type="radio" name="gender" id="other" value="3" class="ml-3"><label for="other" class="ml-1">অন্যান্য</label>
                                </p>
                                @error('gender')
                                <b class="invalid-feedback mb-2"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="password" name="password" placeholder="পাসওয়ার্ড" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <b class="invalid-feedback"><i class="fa fa-exclamation-triangle"></i> {{$message}}</b>
                                @enderror

                                <input type="password" name="password_confirmation" placeholder="পুনরায় পাসওয়ার্ড" class="form-control">

                                <button type="submit" class="register-btn">নিবন্ধন করুন</button>
                            </form>
                            <p class="mt-3 text-center text-muted">আপনার অ্যাকাউন্ট থাকলে ? <a href="{{ route('login') }}">লগইন করুন</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Register area end-->

@endsection
