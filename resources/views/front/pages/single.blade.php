@extends('front.layouts.master')
@section('title', $post[0]->slug_en)
@push('meta')
    <meta property="og:title" content="{{ $post[0]->title_en }}">
    <meta property="og:description" content="{{ $post[0]->title_en }}">
    <meta property="og:image" content="{{ $post[0]->getFirstMediaUrl('post') }}">
    <meta property="og:url" content="{{ route('front.single',['slug'=> $post[0]->slug_en]) }}">
    <meta name="twitter:card" content="{{ $post[0]->getFirstMediaUrl('post') }}">
@endpush
@section('content')

    <!--Single page area start-->
    <div class="fact-single-page-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="fact-single-page-main-content">
                        <a href="{{ $post[0]->categories[0]->slug_en }}" class="category">{{ (App::getLocale() == 'en') ? $post[0]->categories[0]->name_en : $post[0]->categories[0]->name_bn }}</a>
                        <h2>{{ (App::getLocale() == 'en') ? $post[0]->title_en : $post[0]->title_bn }}</h2>
                        <div class="single-share"><span>প্রকাশ: {{ \Carbon\Carbon::createFromDate($post[0]->created_at)->diffForHumans() }}</span>
                            <div class="social-share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('front.single',['slug'=> $post[0]->slug_en]) }}" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="" ><i class="fab fa-instagram"></i></a>
                                <a href="https://twitter.com/intent/tweet?url={{ route('front.single',['slug'=> $post[0]->slug_en]) }}" target="_blank"><i class="fab fa-twitter"></i></a></div>
                        </div>
                        <img src="{{ $post[0]->getFirstMediaUrl('post') }}" alt="">

                        <div class="fact-single-page-content">
                            {!!  (App::getLocale() == 'en') ? $post[0]->content_en : $post[0]->content_bn !!}
                        </div>

                    </div>

                    <div class="fact-comment-area-start">
                        <h4>মন্তব্য (5)</h4>
                        <hr>

                        <form action="{{ route('front.post.comment') }}" method="POST">
                            <textarea name="comment" id="" cols="30" rows="4" placeholder="মতামত" class="form-control"></textarea>
                            <button class="btn btn-primary">মন্তব্য করুন</button>
                        </form>

                        <div class="media">
                            <div class="media-head mr-2">
                                <img src="{{asset('assets/images/7.jpg')}}" alt="" style="width: 30px; height: 30px; border-radius: 50%">
                            </div>
                            <div class="media-body">
                                <span>Author Name</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, sequi.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="fact-single-page-sidebar-area">
                        <h4>এ সম্পর্কিত আরও পড়ুন</h4>
                        @foreach($related as $value)
                        <div class="fact-sidebar-single-post">
                            <div class="sidebar-post-content">
                                <a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a>
                                <br>
                                <span>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</span>
                            </div>
                            <div class="sidebar-post-image">
                                <img src="{{ $value->getFirstMediaUrl('post') }}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Single page area end-->

@endsection
