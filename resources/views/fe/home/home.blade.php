@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description)
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/home.css') }}">
<link rel="stylesheet" href="{{ asset('fe/css/homemb.css') }}">
@endsection
@section('class_body', "home_banner_video_full_header")
@section('content')
<div class="home_content_image home_banner_video_full slideHomePage">
    @foreach($listStoryLimit as $key => $item)
        <div class="groupSlide slideHome{{$key+1}}" style="display: none;">
            <div class="fullSize">
                <img src="{{$item->image ? $item->image : '/'}}" />
            </div>
            <div class="titleListDirectory">
                <i class="fas fa-chevron-up d-none"></i>
                <a href="{{$item->link}}" class="titleSlide">{{$item->name}}</a>
                <a href="{{$item->link}}" class="desSlide">{{$item->name_contact}}</a>
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
        $(window).scroll(function(){
            if ($(window).scrollTop() > 50) {
                $('.scrollToTop').show();
            } else {
                $('.scrollToTop').hide()
            }
        });
        $('.scrollToTop').on('click', function () {
            $('html, body').animate({
                scrollTop: 0
            }, 600);
        });
    });

    document.addEventListener('touchstart', handleTouchStart, false);        
    document.addEventListener('touchmove', handleTouchMove, false);
    var xDown = null;                                                        
    var yDown = null;

    function getTouches(evt) {
    return evt.touches ||             // browser API
            evt.originalEvent.touches; // jQuery
    }                                                     

    function handleTouchStart(evt) {
        const firstTouch = getTouches(evt)[0];                                      
        xDown = firstTouch.clientX;                                      
        yDown = firstTouch.clientY;                                      
    };                                                
    function ChangeSlideUp() {
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
    }
    // xuong
    function ChangeSlideDown() {
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
    function handleTouchMove(evt) {
        
        if ( ! xDown || ! yDown ) {
            return;
        }

        var xUp = evt.touches[0].clientX;                                    
        var yUp = evt.touches[0].clientY;
        if (yUp > yDown) {
            ChangeSlideUp();
        } else {
            if (slideImage > countSlide) {
                
            } else {
                ChangeSlideDown();
            }
        }
        var xDiff = xDown - xUp;
        var yDiff = yDown - yUp;

        if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
            if ( xDiff > 0 ) {
                /* left swipe */ 
            } else {
                /* right swipe */
            }                       
        } else {
            if ( yDiff > 0 ) {
                /* up swipe */ 
            } else { 
                /* down swipe */
            }                                                                 
        }
        /* reset values */
        xDown = null;
        yDown = null;                                             
    };
    
</script>
@endsection