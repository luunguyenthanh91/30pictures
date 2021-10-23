@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description)
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/home.css') }}">
@endsection
@section('class_body', "home_banner_video_full_header")
@section('content')
<div class="home_content_image home_banner_video_full">
    <div class="groupSlide slideHome1" style="display: none;">
        <div class="fullSize">
            <img src="https://wallpaperaccess.com/full/869923.gif" />
        </div>
        <div class="titleListDirectory">
            <!-- @foreach($listStoryLimit as $item)
                        <a href="/director-{{$item->id}}.html">{{$item->description}}<span>{{$item->khachhang}}</span></a>
                    @endforeach -->
            <i class="fas fa-chevron-up d-none"></i>
            <a href="#" class="titleSlide">Đỗ Thái Tài</a>
            <a href="#" class="desSlide">Generalli</a>
            <i class="fas fa-chevron-down"></i>

        </div>
    </div>
    <div class="groupSlide slideHome2" style="display: none;">
        <div class="fullSize">
            <img src="https://i.pinimg.com/originals/12/b2/3a/12b23a7752e8a7a4464c1ff5e596237f.gif" />
        </div>
        <div class="titleListDirectory">
            <!-- @foreach($listStoryLimit as $item)
                        <a href="/director-{{$item->id}}.html">{{$item->description}}<span>{{$item->khachhang}}</span></a>
                    @endforeach -->
            <i class="fas fa-chevron-up"></i>
            <a href="#" class="titleSlide">Chung Chí Công</a>
            <a href="#" class="desSlide">Generalli</a>
            <i class="fas fa-chevron-down"></i>

        </div>
    </div>
    <div class="groupSlide slideHome3" style="display: none;">
        <div class="fullSize">
            <img src="https://cdn.wallpapersafari.com/70/36/Yqx52k.gif" />
        </div>
        <div class="titleListDirectory">
            <!-- @foreach($listStoryLimit as $item)
                        <a href="/director-{{$item->id}}.html">{{$item->description}}<span>{{$item->khachhang}}</span></a>
                    @endforeach -->
            <i class="fas fa-chevron-up"></i>
            <a href="#" class="titleSlide">Ai Cũng Được</a>
            <a href="#" class="desSlide">Generalli</a>
            <i class="fas fa-chevron-down"></i>

        </div>
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>
    var slideImage = 1;
    var countSlide = 3;
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