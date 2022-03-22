@extends('front.layouts.master')
@section('title', $title)
@section('content')

    <!--Archive Search page area start-->
    <div class="fact-search-page-area-start mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h4 class="mb-4" style="font-family: 's-f'; color: #007bff">ক্যাটাগরি : {{ $title }}
                    </h4>
                </div>

                <div class="col-md-12">
                    <div class="fact-popular-post">

                        @forelse($posts[0]['posts'] as $key=>$value)

                            <div class="fact-popular-single-post popular-post">
                                <a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}" class="image-link">
                                    <img class="fact-popular-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                                </a>
                                <h2 class="popular-title"><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                                <p>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</p>
                            </div>
                        @empty
                            <div class="text-center">
                                <span class="alert alert-danger d-inline-block">কোন পোস্ট পাওয়া যায়নি, অনুগ্রহপূর্বক আবার চেষ্টা করুন</span>
                            </div>
                        @endforelse
                    </div>
                    <p class="text-center"> {{ $posts->links('pagination::bootstrap-4') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!--Archive Search page area end-->

@endsection
