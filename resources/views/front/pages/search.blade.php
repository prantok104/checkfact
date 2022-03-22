@extends('front.layouts.master')
@section('title', $search)
@section('content')

    <!--Search page area start-->
    <div class="fact-search-page-area-start mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4" style="font-family: 's-f'; color: #007bff">{{ (App::getLocale() == 'en') ? 'Find' : 'অনুসন্ধান' }} : {{ $search }}</h4>
                </div>

                <div class="col-md-12">
                    <div class="fact-popular-post">
                        @forelse($search_result as $value)
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
                </div>
            </div>
        </div>
    </div>
    <!--Search page area end-->

@endsection
