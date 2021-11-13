@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - ABOUT US')
@section('css_page')
    <link rel="stylesheet" href="{{ asset('fe/css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/aboutMb.css') }}">
@endsection
@section('nav_title')
<div class="header_titleLogo">
    <p class="contentLogo">ABOUT US</p>
</div>
@endsection
@section('content')
@section('class_body', "home_banner_video_full_header")
@section('style_main', "background: black url('".@url(Helper::getSetting(9)->image_mobile)."') center center no-repeat;webkit-background-size: cover;background-size: cover;")
<div class="home_content_image">
    <div class="logo-content-about-us pc-display">
        <img src="{{@url(Helper::getSetting(9)->image_pc)}}" />
    </div>

    <div class="content-about-us">
        {!! Helper::getSetting(9)->description !!}
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>

</script>
@endsection