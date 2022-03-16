
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
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
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

<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousle.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}

@stack('script')

<script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>


