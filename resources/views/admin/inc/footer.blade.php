
<!--Start Footer-->
<!-- Footer Start -->
<footer class="footer text-center text-sm-start">
    &copy; <script>
        document.write(new Date().getFullYear())
    </script> Unikit <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
            class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
</footer>
<!-- end Footer -->
<!--end footer-->
</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->



<!-- Javascript  -->

<script src="{{asset('admin/assets/plugins/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('admin/assets/pages/analytics-index.init.js')}}"></script>
<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@stack('script')
<!-- App js -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>

</body>
<!--end body-->
</html>
