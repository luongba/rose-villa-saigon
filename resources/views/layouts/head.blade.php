<!doctype html>
<html lang="">
<head>
    <link rel="alternate" href="https://www.rosevillasaigon.com/" hreflang="en" />
    <title>Rose Villa Sài Gòn</title>
    <link href="{{asset('public/images/logo/logo_small_landing.png')}}" rel="icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="locale" content="{{ App::getLocale() }}"/>
    {{-- <meta name="language" content="english"> --}}
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('/public/')}}" >
    <!-- CSS Files -->
    @yield('css')
    <link rel="stylesheet" href="{{asset('public/webfonts/stylesheet.css')}}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.css')}}">
    <!-- Optional theme -->
    <link href="https://parsleyjs.org/src/parsley.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/all.css')}}">
    <link href="{{asset('public/style.css')}}" rel="stylesheet" media="screen">
    <link href="{{asset('public/assets/css/curtain.css')}}" rel="stylesheet" media="screen">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>