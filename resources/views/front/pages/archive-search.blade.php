@extends('front.layouts.master')
@section('title', @trans('archive'))
@section('content')

    <!--Archive Search page area start-->
    <div class="fact-search-page-area-start mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @php
                        $month = [
                                "1" => "জানুয়ারী",
                               "2" =>"ফেব্রুয়ারী",
                               "3" => "মার্চ",
                               "4" => "এপ্রিল",
                               "5" => "মে",
                               "6" => "জুন",
                               "7" => "জুলাই",
                               "8" => "আগষ্ট",
                               "9" => "সেপ্টেম্বর",
                               "10" => "অক্টোবর",
                               "11" => "নভেম্বর",
                               "12" => "ডিসেম্বর",
                            ];
                    @endphp
                    <h4 class="mb-4" style="font-family: 's-f'; color: #007bff">আর্কাইভ: @foreach($month as $key=>$value)
                                                            @if($search['month'] == $key)
                                                                {{ $value }}
                                                            @endif
                                                          @endforeach, {{ E2B($search['year']) }}
                    </h4>
                </div>

                <div class="col-md-12">
                    <div class="fact-popular-post">
                        @forelse($archive as $value)
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
                   <p class="text-center"> {{ $archive->links('pagination::bootstrap-4') }}</p>
                </div>
            </div>
        </div>
    </div>
    <!--Archive Search page area end-->

@endsection
