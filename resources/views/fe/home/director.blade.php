<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Helper::getSetting(1)->description}} - STORY SELLERS - {{@$story->description}}</title>
    <meta property="og:url" content="{{@url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{Helper::getSetting(1)->description}} - STORY SELLERS - {{@$story->description}}">
    <meta property="og:description" content="{{Helper::getSetting(2)->description}}">
    <meta property="og:image" content="{{@url(@$story->image_pc ? $story->image_pc : '/')}}">
    <!-- <meta property="fb:app_id" content=""> -->

    <meta name="description" content="This is the website description. Nice eh?">
 
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{Helper::getSetting(1)->description}} - STORY SELLERS - {{@$story->description}}">
    <meta itemprop="description" content="{{Helper::getSetting(2)->description}}">
    <meta itemprop="image" content="{{@url(@$story->image_pc ? $story->image_pc : '/')}}">
   
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{Helper::getSetting(1)->description}} - STORY SELLERS - {{@$story->description}}">
    <meta name="twitter:description" content="{{Helper::getSetting(2)->description}}">
    <meta name="twitter:image" content="{{@url(@$story->image_pc ? $story->image_pc : '/')}}">


    <meta name="keywords" content="{{Helper::getSetting(1)->description}} - STORY SELLERS - {{@$story->description}}">
    <meta name="description" content="{{Helper::getSetting(2)->description}}">
    <meta name="author" content="tivatheme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{ asset('fe/media/favico_icon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CSource+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet" />
    <!-- Bundle and Base CSS -->
    <link href="{{ asset('fe/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fe/css/vendor/jquery-ui.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('fe/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/pc.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/mobile.css') }}">

    <link rel="stylesheet" href="{{ asset('fe/css/derector.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/slick/slick-theme.css') }}">
</head>

<body class="nk-body home_banner_video_crop_header">

    <div class="nk-wrap">
        <header>
            <div class="header_logo">
                <a href="/index.html"><img src="{{@url(Helper::getSetting(5)->image_pc)}}" /></a>
            </div>
            <div class="header_titleLogo">
                <a href="story.html" class="titleLogo">
                    {{@$story->description}}
                </a>
                <p class="contentLogo">SHOWREEL - PROJECT</p>
            </div>
            <div class="header_menu">
                <a class="menu_btn_toggle"><img src="{{ asset('fe/media/frame.png') }}" /></a>
            </div>
        </header>

        <main>
            <div class="bg_style">
                <div class="home_content_image">
                    <div class="mobile_style_slide">
                        @if ($storyBig)
                            <div class="item">
                                <div class="block-1 block">
                                    <a href="/video-{{$storyBig->id}}.html">
                                        <img src="{{@url($storyBig->image_mobile ? $storyBig->image_mobile : '/' )}}" class="bg" alt="{{$storyBig->name}}" />
                                        <div class="title_play">{{$storyBig->name}}</div>
                                    </a>
                                </div>
                            </div>
                        @endif
                        @foreach($listStory as $item)
                            <div class="item">
                                <div class="block-1 block">
                                    <a href="/video-{{$item->id}}.html">
                                        <img src="{{@url($item->image_mobile ? $item->image_mobile : '/' )}}" class="bg" alt="{{$item->name}}" />
                                        <div class="title_play">{{$item->name}}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                                
                            
                    </div>
                    <div class="pc_style_slide">
                        <div class="video_big">
                            @if ($storyBig)
                                <a href="/video-{{$storyBig->id}}.html" class="item" rel="{{@url($storyBig->image_pc ? $storyBig->image_pc  : '/' )}}" >
                                    <div class="block-1 block">
                                        <img src="{{@url($storyBig->image_pc ? $storyBig->image_pc : '/' )}}" class="bg" alt="{{$storyBig->name}}" />
                                        <div class="bg_bg"></div>
                                        <div class="desscription">{!! $storyBig->description !!}</div>
                                        <div class="seemore">See More ></div>
                                        <div class="title_play">{{$storyBig->name}}</div>
                                        <div class="title_play_des">{{$storyBig->meme}}</div>
                                        
                                    </div>
                                </a>
                            @endif
                        </div>
                        <div class="video_small">
                            <!-- <div class="olv_nav">
                                <button type="button" role="presentation" class="nav_pre hidden"><i class="arrow up"></i></button>
                                <button type="button" role="presentation" class="nav_next @if(count($listStory) <= 2 ) hidden @endif"><i class="arrow down"></i></button>
                            </div> -->
                            <div class="video_content">
                                @foreach($listStory as $key => $item)
                                    <a id="item_scroll_{{$key}}" href="/video-{{$item->id}}.html" class="item" rel="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" >
                                        <div class="@if ($key == 0 || $key%2 == 0) block-1 @else block-2 @endif block">
                                            <img src="{{@url($item->image_pc ? $item->image_pc : '/' )}}" class="bg" alt="{{$item->name}}" />
                                            <div class="seemore">See More ></div>
                                            <div class="bg_bg"></div>
                                            <div class="title_play">{{$item->name}}</div>
                                            <div class="title_play_des">{{$item->meme}}</div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @include('fe.layouts.menu')
            </div>
        </main>
        <footer>
            <div class="block_memu">
                <div class="footer_static footer_static_pc">
                    <a href="/index.html">
                        <p class="title">THIRTY PICTURES CO,.LTD</p>
                    </a>
                </div>
                <div class="footer_static footer_static_mobile">
                    <p class="title">STORYSELLERS</p>
                    <p class="description">Director List</p>
                </div>
                <div class="footer_list foter_list_pc">
                            
                    <div class="menu_item">
                        <a href="/about-us.html">
                            <p class="title">ABOUT US</p>
                        </a>
                    </div>
                    <div class="menu_item itemListChild">
                        <a class="openDirector">
                            <p class="title">DIRECTORS <i class="fa fa-chevron-up" aria-hidden="true"></i></p>
                        </a>
                        <div class="absolu_footer_list hidden">
                            <p class="title_header_list">DIRECTOR LIST</p>
                            <div class="title_content_list">
                                @foreach($listStoryS as $item)
                                    <a href="/director-{{$item->id}}.html">
                                        <p class="title">{{$item->description}}</p>
                                    </a>
                                @endforeach
                                   
                            </div>
                        </div>
                    </div>
                    <div class="menu_item">
                        <a href="/contact.html">
                            <p class="title">CONTACT</p>
                        </a>
                    </div>

                </div>
                <div class="footer_search">
                    <form method="get" action="/search.html" >
                        @csrf
                        <input class="search_input" type="text" name="key" required placeholder="Director Video">
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg></button>
                    </form>
                </div>

                <div class="footer_list foter_list_mobile">
                    <div class="carowsel carowsel_mobile">
                        
                        @foreach($listStoryS as $item)
                            
                            <div class="menu_item">
                                <a href="/director-{{$item->id}}.html">
                                    <p class="title">{{$item->name}}</p>
                                    <p class="description">{{$item->description}}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <div class="copyright-footer">
                © COPYRIGHT 2021 30 PICTURES ALL RIGHTS RESERVED
            </div>
        </footer>
        
    </div>

    <div class="video_mobile_play hidden">
        <a class="close_video_popup"><img src="{{ asset('fe/media/close.png') }}" /></a>
        <video  controls playsinline>
            <source src="" type="video/mp4">
        </video>
    </div>
    @if($bgDirectory->description != '')
        <style>
            main {
                background: {{$bgDirectory->description}};
            }
        </style>
    @endif
    <!-- JavaScript -->
    <script src="{{ asset('fe/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('fe/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('fe/js/vendor.min.js') }}"></script>
    <script src="{{ asset('fe/js/functions.js') }}"></script>
    <script src="{{ asset('fe/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('fe/js/derector.js') }}"></script>
    <script>
        var countDiv = {{count($listStory) - 1}};
        var flagScroll = 0;
         
        $(document).ready(function() {
            $('.nav_next').on('click',function() {
                if (flagScroll < countDiv) {
                    flagScroll += 1;
                    $('.video_content').animate({
                        scrollTop:  $('.video_content').scrollTop() - $('.video_content').offset().top + $('.video_content #item_scroll_'+flagScroll).offset().top 
                    }, 1000); 
                }
                if (flagScroll == countDiv) {
                    $('.nav_next').addClass('hidden');
                } else {
                    $('.nav_next').removeClass('hidden');
                }

                if (flagScroll > 0) {
                    $('.nav_pre').removeClass('hidden');
                } else {
                    $('.nav_pre').addClass('hidden');
                }

            });
            $('.nav_pre').on('click',function() {
                if (flagScroll > 0) {
                    flagScroll -= 1;
                    $('.video_content').animate({
                        scrollTop:  $('.video_content').scrollTop() - $('.video_content').offset().top + $('.video_content #item_scroll_'+flagScroll).offset().top 
                    }, 1000); 
                }

                if (flagScroll == countDiv) {
                    $('.nav_next').addClass('hidden');
                } else {
                    $('.nav_next').removeClass('hidden');
                }

                if (flagScroll > 0) {
                    $('.nav_pre').removeClass('hidden');
                } else {
                    $('.nav_pre').addClass('hidden');
                }
                
            });

            
            if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
                $('.menu_btn_toggle').on('click', function() {
                    $(".box").animate({
                        width: "100vw"
                    }, 1000);
                    $('header').addClass('hidden');
                    $('footer').addClass('hidden');
                });
            } else {
                // $('.video_big .item').on('mouseover',function() {
                //     $('main').attr('style','background: url('+$(this).attr('rel')+') center center no-repeat;webkit-background-size: cover; background-size: cover;');
                //     $('.bg_style').attr('style','background: rgba(0,0,0,0.4) ;');
                // });
                // $('.video_big .item').on('mouseout',function() {
                //     $('main').attr('style','');
                //     $('.bg_style').attr('style','');
                // });
                // $('.video_small .item').on('mouseover',function() {
                //     $('main').attr('style','background: url('+$(this).attr('rel')+') center center no-repeat;webkit-background-size: cover; background-size: cover;');
                //     $('.bg_style').attr('style','background: rgba(0,0,0,0.4) ;');
                // });
                // $('.video_small .item').on('mouseout',function() {
                //     $('main').attr('style','');
                //     $('.bg_style').attr('style','');
                // });
                var width = $(window).width();

                $('.menu_btn_toggle').on('click', function() {
                    $(".box").animate({
                        width: "410px"
                    }, 1000);
                    $(".home_content_image").animate({
                        width: width-410 + "px"
                    }, 1000);
                    
                    $('header').addClass('hidden');
                    $('footer').addClass('hidden');
                });

                $('.openDirector').on('click', function() {
                    $('.absolu_footer_list').toggleClass('hidden');
                });
            }
            
            $(document).mouseup(function(e) {
                var container = $(".box");
                if (!container.is(e.target) && container.has(e.target).length === 0 && container.width() > 0) {
                    console.log("here");
                    $(".box").animate({
                        width: "0px"
                    });
                    $(".home_content_image").animate({
                        width: "100%"
                    }, 1000);
                    $('header').removeClass('hidden');
                    $('footer').removeClass('hidden');
                }
                var containerListSearch = $(".itemListChild");
                if (!containerListSearch.is(e.target)) {
                    $('.absolu_footer_list').addClass('hidden');
                }
            });
            $('.carowsel_mobile').slick({
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
            });
            $('.carowsel_pc').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
            });
            $('.close_menu_box').on('click', function() {
                $(".box").animate({
                    width: "0px"
                });
                $('header').removeClass('hidden');
                $('footer').removeClass('hidden');
            });

            $('.icon_play').on('click', function() {
                $('.video_mobile_play').removeClass('hidden');
            });
            $('.close_video_popup').on('click', function() {
                $('.video_mobile_play').addClass('hidden');
            });
            var $Carousel5 = $(".slide_mobile_mail .owl-carousel");
            $Carousel5.owlCarousel({
                loop: false,
                autoplay: $Carousel5.data("autoplay"),
                margin: '',
                nav: false,
                dots: true,
                dotsSpeed: $Carousel5.data('speed'),
                center: $Carousel5.data('center'),
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1,
                    }
                }
            });
            
        });
    </script>
    

</body>

</html>