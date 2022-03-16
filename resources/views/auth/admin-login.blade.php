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
                            <h3>লগইন  ফরম</h3>
                        </div>
                        <div class="fact-register-form">
                            @if (Session::has('status'))
                                <p class="text-success text-left"><i class="fa fa-check-circle"></i> {{ Session::get('status') }}</p>
                            @endif

                            <form action="{{route('admin.login.submit')}}" method="POST">
                                @csrf

                                <input type="email" name="email" placeholder="আপনার ইমেইল লিখুন" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"  autocomplete="off" autofocus>

                                <input type="password" name="password" placeholder="পাসওয়ার্ড" class="form-control  @error('email') is-invalid @enderror"  autocomplete="off">

                                @if (Session::has('error'))
                                    <p class="text-danger text-left"><i class="fa fa-exclamation-triangle"></i>{{ Session::get('error') }}</p>
                                @endif
                                <button type="submit" class="register-btn">লগইন করুন</button>
                            </form>


                            <p class="mt-3 text-center text-muted"><a href="">আপনি কি পাসওয়ার্ড ভুলে গেছেন?</a></p>
                            <p class="mt-2 text-center text-muted">আপনার অ্যাকাউন্ট না থাকলে? <a href="{{route('admin.register')}}">অ্যাকাউন্ট তৈরি করুন</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Register area end-->
@endsection
