@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - Blogs')
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/blogs.css') }}">
<link rel="stylesheet" href="{{ asset('fe/css/blogsMb.css') }}">
@endsection
@section('nav_title')
<div class="header_titleLogo">
    <p class="contentLogo">BEHIND THE SCENE ALBUMS</p>
</div>
@endsection
@section('class_body', "home_banner_video_crop_header")
@section('content')
<div class="bg_style">
    <div class="home_content_image">
        <div class="pc_style_slide">
            @php($count=1)
            @foreach($listBlogs as $key => $item)
            @if($key%3 == 0)
            <div class="slide-story slide-count-{{$count}}">
            @php($count++)
            @endif
            <div class="item @if ($key%3 == 1) first @endif @if ($key%3 == 2) last @endif ">
                <a alt="{{$item->title}}" rel="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" href="/blogs/{{$item->slug}}" class="@if ($key == 0 || $key%2 == 0) block-1 @else block-2 @endif block">
                    <div class="image_size">
                        <img class="lazyloaded" loading="lazy" alt="{{$item->title}}" src="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" />
                        <div class="hoverBgStory">
                            <p class="title">{{$item->title}}</span></p>
                            <p class="description">{{$item->shor_title}}</p>
                        </div>
                    </div>
                </a>
            </div>
            @if($key%3 == 2 || $key == count($listBlogs) - 1)
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>
    var slideImage = 1;
    var countSlide = {{$count - 1}};
    $(document).ready(function() {
        $('.pc_style_slide').on('DOMMouseScroll mousewheel', $.debounce(250, function(event) {
            var heightElement = $('.pc_style_slide').height();
            var $container = $('.pc_style_slide');
            if (event.originalEvent.wheelDelta > 0) {
                var $scrollTo = $('.slide-count-'+ (Math.floor($('.pc_style_slide').scrollTop()/heightElement) + 1));
                $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop(), scrollLeft: 0},500); 
            } else {
                var $scrollTo = $('.slide-count-'+ (Math.ceil($('.pc_style_slide').scrollTop()/heightElement) + 1));
                $container.animate({scrollTop: $scrollTo.offset().top - $container.offset().top + $container.scrollTop(), scrollLeft: 0},500); 
            }
        }));
    });
</script>
@endsection