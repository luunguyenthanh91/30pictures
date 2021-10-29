@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description)
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/home.css') }}">
@endsection
@section('class_body', "home_banner_video_full_header")
@section('content')
<div class="home_content_image home_banner_video_full">
    @foreach($listStoryLimit as $key => $item)
        <div class="groupSlide slideHome{{$key+1}}" style="display: none;">
            <div class="fullSize">
                <img src="{{$item->slide_gif_pc ? $item->slide_gif_pc : '/'}}" />
            </div>
            <div class="titleListDirectory">
                <i class="fas fa-chevron-up d-none"></i>
                <a href="/director-{{$item->id}}.html" class="titleSlide">{{$item->description}}</a>
                <a href="/director-{{$item->id}}.html" class="desSlide">{{$item->khachhang}}</a>
                <i class="fas fa-chevron-down"></i>

            </div>
        </div>
    @endforeach
</div>
@endsection
@section('before_footer_scripts')
<script>
    var slideImage = 1;
    var countSlide = {{count($listStoryLimit)}};
    $(document).ready(function() {
        $('.slideHome1').fadeIn(500);
        $('.fa-chevron-down').on('click', function() {
            $('.titleListDirectory .fa-chevron-up').removeClass('d-none');
            if (slideImage < countSlide) {
                $(".slideHome" + slideImage).fadeOut(0);
                $(".slideHome" + (slideImage + 1)).fadeIn(500);
                $('.fa-chevron-down').removeClass('d-none');
                slideImage++;
                if (slideImage == countSlide) {
                    $('.fa-chevron-down').addClass('d-none');
                }
            } else {
                $('.fa-chevron-down').addClass('d-none');
            }
        });
        $('.titleListDirectory .fa-chevron-up').on('click', function() {
            $('.fa-chevron-down').removeClass('d-none');
            if (slideImage > 1) {
                $(".slideHome" + slideImage).fadeOut(0);
                $(".slideHome" + (slideImage - 1)).fadeIn(500);
                slideImage--;
                $('.fa-chevron-up').removeClass('d-none');
                if (slideImage == 1) {
                    $('.fa-chevron-up').addClass('d-none');
                }
            } else {
                $('.fa-chevron-up').addClass('d-none');
            }
        });
        $(window).on('DOMMouseScroll mousewheel', $.debounce(250, function(event) {
            if (event.originalEvent.wheelDelta > 0) {
                $('.fa-chevron-down').removeClass('d-none');
                if (slideImage > 1) {
                    $(".slideHome" + slideImage).fadeOut(0);
                    $(".slideHome" + (slideImage - 1)).fadeIn(500);
                    slideImage--;
                    $('.titleListDirectory .fa-chevron-up').removeClass('d-none');
                    if (slideImage == 1) {
                        $('.titleListDirectory .fa-chevron-up').addClass('d-none');
                    }
                } else {
                    $('.titleListDirectory .fa-chevron-up').addClass('d-none');
                }
            } else {
                $('.titleListDirectory .fa-chevron-up').removeClass('d-none');
                if (slideImage < countSlide) {
                    $(".slideHome" + slideImage).fadeOut(0);
                    $(".slideHome" + (slideImage + 1)).fadeIn(500);
                    $('.fa-chevron-down').removeClass('d-none');
                    slideImage++;
                    if (slideImage == countSlide) {
                        $('.fa-chevron-down').addClass('d-none');
                    }
                } else {
                    $('.fa-chevron-down').addClass('d-none');
                }
            }
        }));
    });
</script>
@endsection