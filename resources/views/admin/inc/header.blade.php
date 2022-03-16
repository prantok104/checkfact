<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="utf-8" />
    <title> | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    App favicon
    <link rel="shortcut icon" href="assets/images/favicon.ico"> -->

    <meta charset="utf-8" />
    <title>@yield('title') | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">

    <!-- App css -->
    @stack('style')
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <style>
        .left-sidebar .menu-body .nav-item .nav-link:hover, .left-sidebar .menu-body .nav-item.menuitem-active .nav-link.active, body.dark-sidebar .left-sidebar .navbar-vertical .navbar-nav .nav-link[data-bs-toggle=collapse][aria-expanded=true] {background: #486BD3;color: #fff!important;}
    </style>


</head>

<body id="body" class="dark-sidebar">

@include('admin.inc.left-sidebar')
@include('admin.inc.top-bar')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content-tab">
