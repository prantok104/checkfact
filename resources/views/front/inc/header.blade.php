<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{trans('title right')}}</title>

    @stack('meta')

    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!--Owl-carousel CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">

    <!--Owl-carousel Theme CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    <!--PrettyPhoto CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/prettyPhoto.css')}}">

    <!--Magnific Popup CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!--FontAwesome CSS-->
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">

    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!--Slicknav CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">


    @stack('style')

    <!--Main Style CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!--Responsive CSS-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">


</head>

<body>
{{-- Count Realtime Visitor and hits--}}
{{ \App\Models\Tracker::hit() }}

<!--header top area start-->
<div class="header-top-area-start">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-8">
                <div class="single-part">
                    <p><i class="fal fa-envelope"></i> <a href="mailto:content@check-fact.com">content@check-fact.com</a></p>
                </div>
            </div>
            <div class="col-md-6 col-4">
                <div class="single-part text-right">
                    <div class="footer-social-media">
                        <a href="https://www.facebook.com/checkfactbd"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/channel/UCxweY1fZPYgx_8rOw1yQdgg"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header top area end-->

<!--Mobile menu area start-->
<header class="mobile-menu-area-start">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu-content">
                    <div class="mobile-menu-logo">
                        <a href="" class="custom-logo-link"><img src="{{asset('assets/images/logo.png')}}" alt="logo" class="custom-logo"></a>
                    </div>
                    <div class="fact-header-right">
                        <ul class="fact-right-menu">
                            <!--<li><a href="#"><i class="fal fa-heart"></i></a></li>-->
                            <li><a href="javascript:void(0)" class="search-form-open" data-toggle="modal" data-target="#searchModal"><i class="fal fa-search"></i></a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                    <div class="mobile-menu-area">
                        <div class="responsive-mobile-menu"></div>

                        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="searchModalLabel">??????????????????????????? ????????????</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('front.global.search') }}" method="GET" class="d-flex align-items-center justify-content-center">
                                            <input type="search" name="s" placeholder="?????? ??????????????????????????? ???????????? ?????????" class="form-control">
                                            <button type="submit" class="search-btn btn btn-primary"><i class="fal fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Mobile menu area end-->


<!-- Header area start -->
<header class="fact-header-area-start">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="fact-header-main-context">
                    <div class="fact-logo-area-start">
                        <a href="{{route('front.homepage')}}" class="custom-logo-link"><img src="{{asset('assets/images/logo.png')}}" alt="logo" class="custom-logo"></a>
                    </div>
                    <div class="fact-main-menu-area">
                        <div class="menu-main-menu-container">
                            <ul id="primary-menu" class="menu">
                                <li>
                                    <form action="" method="GET"><i class="fab fa-google"></i> <input type="text" name="fact-check-search" placeholder="???????????? ?????? ??????????????? ???????????? ?????????"> <button class="submit"><i class="fal fa-search"></i></button></form></li>
                                <li><a href="{{ route('front.news') }}">???????????????</a></li>
                                <li><a href="">{{ __('category') }} <i class="fal fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        @foreach($header_category as $value)
                                            <li><a href="{{route('front.category', ['slug' =>  $value->slug_en])}}">{{ $value->name_bn }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                @if(Auth::user())
                                <li><a href="{{ route('front.user') }}">????????????????????? <i class="fal fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('front.logout')}}">?????? ?????????</a></li>
                                    </ul>
                                </li>
                                @else
                                <li><a href="{{route('login')}}">{{ trans('login') }}</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="fact-header-right">
                        <ul class="fact-right-menu">
                            <li><a href="javascript:void(0)" class="search-form-open"><i class="fal fa-search"></i></a></li>
                            <li><a href="{{(App::isLocale('bn')) ? route('change.lang', 'en') : route('change.lang', 'bn')}}">
                                    {{(App::isLocale('bn')) ? 'English' : '???????????????'}}
                                </a></li>
                        </ul>
                    </div>

                    <!-- Search area start -->
                    <div class="fact-search-area-start">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="fact-search-context">
                                        <form action="{{ route('front.global.search') }}" method="GET" class="fact-search-form">
                                            <div class="fact-input-group">
                                                <button type="submit" class="fact-search-btn"><i class="fal fa-search"></i></button>
                                                <input type="search" id="s" name="s" class="form-control" placeholder="?????? ??????????????????????????? ???????????? ?????????">
                                            </div>
                                            <span class="fact-search-close"><i class="fal fa-times"></i></span>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Search area end -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header area end -->
