@extends('front.layouts.master')
@section('title', @trans('title'))
@section('content')
    <!-- Hero area start-->
    <div class="fact-hero-area-start overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="hero-area-start">
                    @forelse($hero_posts as $key=>$value)
                    <div class="hero-column-post-area">
                        <div class="hero-single-post-area">
                            <img class="hero-single-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                            <h2><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}" class="fact-post-title">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                        </div>
                    </div>
                    @empty
                        <span class="d-inline-block alert alert-danger">No post found</span>
                    @endforelse
                    @forelse($fixed_hero as $key=>$value)
                    <div class="hero-column-post-area middle-hero-post">
                        <div class="hero-single-post-area">
                            <img class="hero-single-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                            <h2><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}" class="fact-post-title">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                        </div>
                    </div>
                    @empty
                        <span class="d-inline-block alert alert-danger">No post found</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <!-- Hero area end-->

    <!-- Category area start -->
    <div class="fact-category-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fact-project-post-title">
                        <h2 class="project-title">ভিডিও</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="fact-category-slidera-area owl-carousel owl-theme">

                        @forelse($video_posts as $value)
                        <div class="fact-popular-single-post category-post">
                            <a class="video-modal" href="https://www.youtube.com/watch?v={{$value->video_link}}"> <i class="fal fa-play-circle"></i></a>
                            <img class="fact-popular-post-image" src="{{ $value->getFirstMediaUrl('video') }}" alt="Post image">
                            <h2 class="popular-title"><a href="javascript:void(0)">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                            <p>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</p>
                        </div>
                        @empty
                            <span class="alert alert-danger">No Video Posts Found</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category area end -->

    <!-- Post title area start -->
    <div class="fact-post-title-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fact-project-post-title">
                        <h2 class="project-title">সর্বাধিক পঠিত</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post title area end -->


    <!-- Post area start -->
    <div class="fact-post-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fact-popular-style1">
                        @forelse($maximum_reading as $value)
                        <div class="fact-popular-style-single-post">
                            <div class="style-post-content">
                                <h2 class="popular-title"><a href="{{ route('front.single', ['slug'=> $value->slug_en]) }}">{{ (App::getLocale() == 'en') ? $value->title_en : $value->title_bn }}</a></h2>
                                <div class="post-content">
                                    {!!   (App::getLocale() == 'en') ? Str::words($value->content_en, '15') : Str::words($value->content_bn, '15') !!}
                                </div>
                                <p>{{ \Carbon\Carbon::createFromDate($value->created_at)->diffForHumans() }}</p>
                            </div>
                            <div class="style-post-image">
                                <img class="fact-popular-post-image" src="{{ $value->getFirstMediaUrl('post') }}" alt="Post image">
                            </div>
                        </div>
                        @empty
                            <span class="alert alert-danger">No Video Posts Found</span>
                        @endforelse

                    </div>
                </div>

{{--                <div class="col-md-12">--}}
{{--                    <div class="fact-popular-post">--}}

{{--                        <div class="fact-popular-single-post popular-post">--}}
{{--                            <a href="" class="image-link">--}}
{{--                                <img class="fact-popular-post-image" src="assets/images/2.jpg" alt="Post image">--}}
{{--                            </a>--}}
{{--                            <h2 class="popular-title"><a href="">মদ্যপানের লাইসেন্স পাওয়া যাবে ২১ বছর বয়স হলেই?</a></h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>সম্প্রতি পূর্ব ইউক্রেন সীমান্তে লাখো সেনা মোতায়েন নিয়ে পশ্চিমাদের সঙ্গে চরম উত্তেজনার মধ্যেই গত ২১</p>--}}
{{--                            </div>--}}
{{--                            <p>৩২ মিনিট আগে</p>--}}
{{--                        </div>--}}

{{--                        <div class="fact-popular-single-post popular-post">--}}
{{--                            <a href="" class="image-link">--}}
{{--                                <img class="fact-popular-post-image" src="assets/images/2.jpg" alt="Post image">--}}
{{--                            </a>--}}
{{--                            <h2 class="popular-title"><a href="">মদ্যপানের লাইসেন্স পাওয়া যাবে ২১ বছর বয়স হলেই?</a></h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>সম্প্রতি পূর্ব ইউক্রেন সীমান্তে লাখো সেনা মোতায়েন নিয়ে পশ্চিমাদের সঙ্গে চরম উত্তেজনার মধ্যেই গত ২১</p>--}}
{{--                            </div>--}}
{{--                            <p>৩২ মিনিট আগে</p>--}}
{{--                        </div>--}}

{{--                        <div class="fact-popular-single-post popular-post">--}}
{{--                            <a href="" class="image-link">--}}
{{--                                <img class="fact-popular-post-image" src="assets/images/2.jpg" alt="Post image">--}}
{{--                            </a>--}}
{{--                            <h2 class="popular-title"><a href="">মদ্যপানের লাইসেন্স পাওয়া যাবে ২১ বছর বয়স হলেই?</a></h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>সম্প্রতি পূর্ব ইউক্রেন সীমান্তে লাখো সেনা মোতায়েন নিয়ে পশ্চিমাদের সঙ্গে চরম উত্তেজনার মধ্যেই গত ২১</p>--}}
{{--                            </div>--}}
{{--                            <p>৩২ মিনিট আগে</p>--}}
{{--                        </div>--}}

{{--                        <div class="fact-popular-single-post popular-post">--}}
{{--                            <a href="" class="image-link">--}}
{{--                                <img class="fact-popular-post-image" src="assets/images/2.jpg" alt="Post image">--}}
{{--                            </a>--}}
{{--                            <h2 class="popular-title"><a href="">মদ্যপানের লাইসেন্স পাওয়া যাবে ২১ বছর বয়স হলেই?</a></h2>--}}
{{--                            <div class="post-content">--}}
{{--                                <p>সম্প্রতি পূর্ব ইউক্রেন সীমান্তে লাখো সেনা মোতায়েন নিয়ে পশ্চিমাদের সঙ্গে চরম উত্তেজনার মধ্যেই গত ২১</p>--}}
{{--                            </div>--}}
{{--                            <p>৩২ মিনিট আগে</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- Post area end -->

    <!--subscribe area start-->
    <div class="fact-subs-area-start">
        <div class="container">
            <div class="row align-items-baseline">
                <div class="col-md-4">
                    <div class="fact-subs-area-form">
                        <h3>ফ্যাক্টচেক গুলো পেতে আমাদের সাথে থাকুন</h3>
                        <form action="{{ route('front.subscriber') }}" method="POST" id="subscribe-form">
                            @csrf
                            <input type="email" name="email" id="email" placeholder="ই-মেইল">
                            <button type="submit" name="subs-btn" id="subs-btn" class="sub-btn">সাবস্ক্রাইব করুন</button>
                        </form>
                        <p  class="error-text email_error text-danger"></p>
                        <p id="subs-output" class="text-success"></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fact-archive-search">
                        <h3>সোশ্যাল মিডিয়া</h3>
                        <ul class="social-link">
                            <li><a href="https://www.facebook.com/checkfactbd"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCxweY1fZPYgx_8rOw1yQdgg"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="fact-archive-search">
                        <h3>আর্কাইভ</h3>
                        <form action="{{ route('front.archive.search') }}" method="GET">
                            <select name="year" id="year" class="form-control @error('year') is-invalid @enderror">
                                <option value="">---- বছর নির্বাচন করুন ----</option>
                                <option value="2022">২০২২</option>
                                <option value="2023">২০২৩</option>
                                <option value="2024">২০২৪</option>
                                <option value="2025">২০২৫</option>
                                <option value="2026">২০২৬</option>
                                <option value="2027">২০২৭</option>
                                <option value="2028">২০২৮</option>
                            </select>
                            @error('year')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <select name="month" id="month" class="form-control mt-2 @error('month') is-invalid @enderror">
                                <option value="">---- মাস নির্বাচন করুন ----</option>
                                <option value="1">জানুয়ারী</option>
                                <option value="2">ফেব্রুয়ারী</option>
                                <option value="3">মার্চ</option>
                                <option value="4">এপ্রিল</option>
                                <option value="5">মে</option>
                                <option value="6">জুন</option>
                                <option value="7">জুলাই</option>
                                <option value="8">আগষ্ট</option>
                                <option value="9">সেপ্টেম্বর</option>
                                <option value="10">অক্টোবর</option>
                                <option value="11">নভেম্বর</option>
                                <option value="12">ডিসেম্বর</option>
                            </select>
                            @error('month')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <button type="submit" class="arch-btn">অনুসন্ধান করুন</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--subscribe area end-->


    <!-- Post title area start -->
    <div class="fact-post-title-area-start">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fact-project-post-title">
                        <h2 class="project-title">ফ্যাক্ট চেক ক্যাটেগরি সমূহ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post title area end -->

    <!--Fact check Category area start-->
    <div class="fact-check-category-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cat-area-context">
                        @foreach($category as $value)
                            <a href="{{ route('front.category', ['slug' => $value->slug_en]) }}">{!!  $value->icon !!}  {{ (App::getLocale() == 'en') ? $value->name_en : $value->name_bn }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fact check Category area end-->



    <!-- register area start -->
    <div class="fact-reg-area-start mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fact-reg-content">

                        <a href="" style="background-image: url('assets/images/7.png')">তথ্য যাচাই করুন</a>

                        <a href="{{ route('front.rumor') }}" style="background-image: url('assets/images/7.png')">ইমেইলের মাধ্যমে গুজব পাঠান</a>

                        <a href="{{ route('register') }}" style="background-image: url('assets/images/8.png')">ভলান্টিয়ার হওয়ার জন্য রেজিস্ট্রেশন করুন</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register area end -->

@endsection

@push('script')
    <script>
        $(function(){
           $('#subscribe-form').on('submit', function(e){
               e.preventDefault();
             $.ajax({
                 url:$(this).attr('action'),
                 method:$(this).attr('method'),
                 data:new FormData(this),
                 processData:false,
                 dataType:'json',
                 contentType:false,
                 beforeSend: function(){
                     $(document).find('p.error-text').text('');
                 },
                 success: function (data) {
                     if(data.status == 0){
                         $('#subs-output').text('');
                         $.each(data.error, function(prefix, val){
                             $('p.'+prefix+'_error').text(val[0]);
                         });
                     }else{
                         $('#subscribe-form')[0].reset();
                         $('#subs-output').text(data.success);
                     }
                 },
             });
           });
        });
    </script>
@endpush
