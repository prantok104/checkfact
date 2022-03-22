
<!--Footer area start-->
<footer class="footer-area-start">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-text">
                    <p>&copy; ফ্যাক্ট চেকার, ২০২০ সর্বসত্ব সংরক্ষিত</p>
                </div>
            </div>
            <div class="col-md-2">
                <div class="footer-social-media">
                    <a href="https://www.facebook.com/checkfactbd"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCxweY1fZPYgx_8rOw1yQdgg"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-menu-area">
                    <div class="menu-footer-menu-container">
                        <ul class="footer-menu">
                            <li><a href="">আমাদের সম্পর্কে</a></li>
                            <li><a href="">মূল্যায়ন প্রক্রিয়া</a></li>
                            <li><a href="">ফ্যাক্ট চেকার টীম</a></li>
                            <li><a href="">অর্থায়ন</a></li>
                            <li><a href="">সংশোধন ও অভিযোগ নীতি</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Footer area end-->

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "100861492558475");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v13.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>



<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@stack('script')

<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>


