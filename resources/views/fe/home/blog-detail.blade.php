@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - BLOGS - '. $blog->title)
@section('css_page')
    <link rel="stylesheet" href="{{ asset('fe/css/blogDetail.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/blogDetailMb.css') }}">
@endsection
@section('nav_title')
<div class="header_titleLogo">
    <p class="contentLogo">BEHIND THE SCENE ALBUMS</p>
</div>
@endsection
@section('content')
@section('class_body', "home_banner_video_full_header")
@section('style_main', "background: url('".@url($blog->image_pc)."') ;")
<div class="home_content_image">
    <div class="logo-content-about-us">
        <p class="titleBlog">{!! $blog->title !!}</p>
        <p class="desBlog">BLOG <a href="/gallery">| GALLERY</a></p>
    </div>

    <div class="content-about-us">
        {!! $blog->description !!}
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>

</script>
@endsection