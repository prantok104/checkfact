@extends('front.layouts.master')
@section('title', @trans('login'))
@section('content')

    <!--Login area start-->
    <div class="fact-register-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="fact-register-form-area">
                        <div class="fact-register-header">
                            <img src="assets/images/logo.png" alt="Logo">
                            <h3>লগইন  ফরম</h3>
                        </div>
                        <div class="fact-register-form">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <input type="email" name="email" placeholder="আপনার ইমেইল লিখুন" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input type="password" name="password" placeholder="পাসওয়ার্ড" class="form-control  @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <button type="submit" class="register-btn">লগইন করুন</button>
                            </form>
                            <p class="mt-3 text-center text-muted"><a href="{{ route('password.request') }}">আপনি কি পাসওয়ার্ড ভুলে গেছেন?</a></p>
                            <p class="mt-2 text-center text-muted">আপনার অ্যাকাউন্ট না থাকলে? <a href="{{ route('register') }}">অ্যাকাউন্ট তৈরি করুন</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Login area end-->
@endsection
