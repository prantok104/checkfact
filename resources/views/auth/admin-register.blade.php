@extends('layouts.app')
@section('content')

    <!--Register area start-->
    <div class="fact-register-area-start" style="min-height: 100vh">
        <div class="container">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <div class="fact-register-form-area">
                        <div class="fact-register-header">
                            <img src="{{asset('assets/images/logo.png')}}" alt="Logo">
                            <h3>নিবন্ধন ফরম</h3>
                        </div>
                        <div class="fact-register-form">
                            <form action="" method="POST">
                                <input type="text" name="uname" placeholder="আপনার নাম লিখুন" class="form-control">
                                <input type="email" name="email" placeholder="আপনার ইমেইল লিখুন" class="form-control">
                                <input type="text" name="phone" placeholder="মোবাইল নম্বর লিখুন" class="form-control">
                                <input type="password" name="password" placeholder="পাসওয়ার্ড" class="form-control">
                                <input type="password" name="confirm" placeholder="পুনরায় পাসওয়ার্ড" class="form-control">
                                <button type="submit" class="register-btn">নিবন্ধন করুন</button>
                            </form>
                            <p class="mt-3 text-center text-muted">আপনার অ্যাকাউন্ট থাকলে ? <a href="{{route('admin.login')}}">লগইন করুন</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Register area end-->

@endsection
