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
        <div class="flex-start">
            <p class="titleBlog">{!! $blog->title !!}</p>
            <p class="desBlog">BLOG <span>| GALLERY</span></p>
        </div>
    </div>

    <div class="content-about-us">
        {!! $blog->description !!}
    </div>
</div>
<div class="bg_style">
    <div class="home_content_image">
        <div class="pc_style_slide">
            @php($count=1)
            @php($flag=0)
            @php($countItem=0)
            @foreach($listGalary as $key => $item)
            @if ($flag == 0)
            @if($countItem%3 == 0)
            <div class="slide-story slide-count-{{$count}}">
                @php($count++)
                @endif
                <div class="item @if ($countItem%3 == 1) first @endif @if ($countItem%3 == 2) last @endif ">
                    <a alt="{{$item->seo}}" rel="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" class="@if ($countItem == 0 || $countItem%2 == 0) block-1 @else block-2 @endif block">
                        @if ($item->type == 2)
                        @php($flag=1)
                        <div class="image_size">
                            <img class="lazyloaded" loading="lazy" alt="{{$item->seo}}" src="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" />
                        </div>
                        <div class="image_size">
                            <img class="lazyloaded" loading="lazy" alt="{{$listGalary[$key + 1]->seo}}" src="{{@url($listGalary[$key + 1]->image_pc ? $listGalary[$key + 1]->image_pc  : '/' )}}" />
                        </div>
                        @else
                        <div class="image_size bigSize">
                            <img alt="{{$item->seo}}" src="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" class="lazyloaded" loading="lazy" />
                        </div>
                        @endif
                    </a>
                </div>
                @if($countItem%3 == 2 || $countItem == count($listGalary) - 1)
            </div>
            @endif

            @php($countItem++)
            @else
            @php($flag=0)
            @endif

            @endforeach
        </div>
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>
    
    $(document).ready(function() {
        $('.pc_style_slide').on('DOMMouseScroll mousewheel', $.debounce(250, function(event) {

        }));
    });
</script>
@endsection