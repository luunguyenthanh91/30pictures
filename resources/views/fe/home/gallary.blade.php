@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - GALLERY')
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/gallary.css') }}">
<link rel="stylesheet" href="{{ asset('fe/css/gallaryMb.css') }}">

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
                                    <img alt="{{$item->seo}}" src="{{@url($item->image_pc ? $item->image_pc  : '/' )}}"  class="lazyloaded" loading="lazy"/>
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