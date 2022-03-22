@extends('front.layouts.master')
@section('title', @trans('news'))
@section('content')

    <!--News page area start-->
    <div class="fact-news-page-area-start">
        <div class="container">
            <div class="row">
                @foreach($posts_first as $key => $value)
                <div class="col-md-7">
                    <div class="news-latest-posts">
                        <div class="hero-single-post-area">
                            <img class="hero-single-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                            <h2><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}" class="fact-post-title">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach($posts_second as $key => $value)
                <div class="col-md-5">
                    <div class="news-one-offset-post">
                        <div class="fact-popular-single-post popular-post">
                            <a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}" class="image-link">
                                <img class="fact-popular-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                            </a>
                            <h2 class="popular-title"><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                            <div class="post-content">
                                <p>সম্প্রতি পূর্ব ইউক্রেন সীমান্তে লাখো সেনা মোতায়েন নিয়ে পশ্চিমাদের সঙ্গে চরম উত্তেজনার মধ্যেই গত ২১</p>
                            </div>
                            <p>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-md-12 mt-4">
                    <div class="fact-popular-style1 news-page-style">
                        @foreach($posts_third as $key => $value)
                        <div class="fact-popular-style-single-post">
                            <div class="style-post-content">
                                <h2 class="popular-title"><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                                <div class="post-content">
                                    <p>সম্প্রতি পূর্ব ইউক্রেন সীমান্তে লাখো সেনা মোতায়েন নিয়ে পশ্চিমাদের সঙ্গে চরম উত্তেজনার মধ্যেই গত ২১</p>
                                </div>
                                <p>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</p>
                            </div>
                            <div class="style-post-image">
                                <img class="fact-popular-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $posts_third->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!--News page area end-->

@endsection
