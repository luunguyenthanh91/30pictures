<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Helper::getSetting(1)->description}} - CONTACT</title>
    <meta property="og:url" content="{{@url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{Helper::getSetting(1)->description}} - CONTACT">
    <meta property="og:description" content="{{Helper::getSetting(2)->description}}">
    <meta property="og:image" content="{{@url(Helper::getSetting(4)->image_pc)}}">
    <!-- <meta property="fb:app_id" content=""> -->

    <meta name="description" content="This is the website description. Nice eh?">
 
    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{Helper::getSetting(1)->description}} - CONTACT">
    <meta itemprop="description" content="{{Helper::getSetting(2)->description}}">
    <meta itemprop="image" content="{{@url(Helper::getSetting(4)->image_pc)}}">
   
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{Helper::getSetting(1)->description}} - CONTACT">
    <meta name="twitter:description" content="{{Helper::getSetting(2)->description}}">
    <meta name="twitter:image" content="{{@url(Helper::getSetting(4)->image_pc)}}">


    <meta name="keywords" content="{{Helper::getSetting(1)->description}} - CONTACT">
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

    <link rel="stylesheet" href="{{ asset('fe/css/contact.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/slick/slick-theme.css') }}">
</head>

<body class="nk-body home_banner_video_full_header">

    <div class="nk-wrap">
        <header>
            <div class="header_logo">
                <a href="/index.html"><img src="{{@url(Helper::getSetting(5)->image_pc)}}" /></a>
            </div>
            <div class="header_menu">
                <a class="menu_btn_toggle"><img src="{{ asset('fe/media/frame.png') }}" /></a>
            </div>
            <div class="header_search">
                <a class="search_btn_toggle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg></a>
                <form method="get" class="form_search_header hidden" action="/search.html" >
                    @csrf
                    <input class="search_input" type="text" name="key" required placeholder="Director Video">
                    <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                    </button>
                </form>
            </div>
            
            <div class="header_titleLogo">
                <p class="contentLogo">CONTACT</p>
            </div>

        </header>

       

        <main>
            <div class="home_content_image">
                <div class="form_contact_custome">
                    <div class="form_contact">
                        <form action="" method="POST" class="p-0 mx-auto form-data" >
                            @csrf
                            
                            @if($message != '')
                            <div class="alert alert-success" role="alert">
                                {{$message}}
                            </div>
                            @endif
                            <div class="group_form">
                                <p>Name*</p>
                                <input type="text" name='name' class="name_input" required />
                            </div>
                            <div class="group_form">
                                <p>Email*</p>
                                <input type="text"  name='email' class="email_input" required />
                            </div>
                            <div class="group_form">
                                <p>Phone</p>
                                <input type="text"  name='phone' />
                            </div>
                            <div class="group_form">
                                <p>Address</p>
                                <input type="text"  name='address' />
                            </div>
                            <div class="group_form">
                                <p>Content*</p>
                                <textarea rows="4" name='content' class="content_input" required ></textarea>

                            </div>
                            <div class="group_form">
                                <div class="btn">
                                    <button type="submit" class="btn_send hidden">Send</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>
                <div class="contact_footer_contect">
                    <div class="item">
                        <p class="title">
                            THIRTY PICTURES
                        </p>
                        <p class="description">
                            <span>{{Helper::getSetting(10)->description}}</span>
                        </p>
                    </div>
                    <div class="item">
                        <p class="title">
                            ADDRESS
                        </p>
                        <p class="description">
                            <span>{{Helper::getSetting(11)->description}}</span>
                        </p>
                    </div>
                    <div class="item">
                        <p class="title">
                            PHONE NUMBER
                        </p>
                        <p class="description">
                            <span>{{Helper::getSetting(12)->description}}</span>
                        </p>
                    </div>
                    <div class="item">
                        <p class="title">
                            Email
                        </p>
                        <p class="description">
                            <span>{{Helper::getSetting(13)->description}}</span>
                        </p>
                    </div>
                    <div class="item">
                        <p class="title">
                            SEE MORE ON
                        </p>
                        <p class="description">
                            <span><a href="{{Helper::getSetting(14)->description}}" target="_blank">Facebook</a> – <a  href="{{Helper::getSetting(15)->description}}" target="_blank">Vimeo</a> - <a  href="{{Helper::getSetting(16)->description}}" target="_blank">Youtube</a></span>
                        </p>
                    </div>
                </div>

            </div>
            @include('fe.layouts.menu')
            
        </main>

        <footer>
            <div class="block_memu">
                <div class="footer_static footer_static_pc">
                    <a href="/index.html">
                        <p class="title">@30PICTURES2021</p>
                    </a>
                </div>
                <div class="footer_static footer_static_mobile">
                    <p class="title">@30PICTURES2021</p>
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
                                @foreach($listStory as $item)
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
                    <!-- <form method="get" action="/search.html" >
                        @csrf
                        <input class="search_input" type="text" name="key" required placeholder="Director Video">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        </button>
                    </form> -->
                    <a href="{{Helper::getSetting(14)->description}}">
                        <svg width="100%" height="100%" viewBox="0 0 900 900" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                            <g transform="matrix(2.31712,0,0,2.29366,-328.105,-142.652)">
                                <g>
                                    <path d="M510.968,170.806C510.968,122.469 472.122,83.226 424.274,83.226L247.339,83.226C199.491,83.226 160.645,122.469 160.645,170.806L160.645,345.968C160.645,394.305 199.491,433.548 247.339,433.548L424.274,433.548C472.122,433.548 510.968,394.305 510.968,345.968L510.968,170.806Z" style="fill:none;stroke:white;stroke-width:23.45px;"/>
                                </g>
                            </g>
                            <use id="facebook-logo.svg" xlink:href="#_Image1" x="305.939" y="183.329" width="288.717px" height="534.017px" transform="matrix(0.99902,0,0,0.998162,0,0)"/>
                            <defs>
                                <image id="_Image1" width="289px" height="535px" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{Helper::getSetting(15)->description}}">
                        <svg width="100%" height="100%" viewBox="0 0 900 900" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                            <g transform="matrix(2.31712,0,0,2.29366,-328.105,-142.652)">
                                <g>
                                    <path d="M510.968,170.806C510.968,122.469 472.122,83.226 424.274,83.226L247.339,83.226C199.491,83.226 160.645,122.469 160.645,170.806L160.645,345.968C160.645,394.305 199.491,433.548 247.339,433.548L424.274,433.548C472.122,433.548 510.968,394.305 510.968,345.968L510.968,170.806Z" style="fill:none;stroke:white;stroke-width:23.45px;"/>
                                </g>
                            </g>
                            <use id="vimeo.svg" xlink:href="#_Image1" x="183.329" y="216.695" width="534.017px" height="467.274px" transform="matrix(0.998162,0,0,0.998448,0,0)"/>
                            <defs>
                                <image id="_Image1" width="535px" height="468px" xlink:href="data:image/png;base64,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"/>
                            </defs>
                        </svg>
                    </a>
                    <a href="{{Helper::getSetting(16)->description}}">
                        <svg width="100%" height="100%" viewBox="0 0 900 900" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                            <g transform="matrix(2.12354,0,0,2.12354,-505.593,-505.593)">
                                <g>
                                    <g transform="matrix(1.09116,0,0,1.08011,83.5814,170.913)">
                                        <path d="M510.968,170.806C510.968,122.469 472.122,83.226 424.274,83.226L247.339,83.226C199.491,83.226 160.645,122.469 160.645,170.806L160.645,345.968C160.645,394.305 199.491,433.548 247.339,433.548L424.274,433.548C472.122,433.548 510.968,394.305 510.968,345.968L510.968,170.806Z" style="fill:none;stroke:white;stroke-width:23.45px;"/>
                                    </g>
                                    <g transform="matrix(1.06192e-16,-0.335243,-0.259107,-7.66591e-17,588.828,640.049)">
                                        <path d="M544.198,216.049C549.147,206.023 557.706,199.955 566.9,199.955C576.095,199.955 584.654,206.023 589.602,216.049C642.061,322.329 771.609,584.79 829.377,701.826C835.101,713.423 835.483,728.135 830.373,740.202C825.262,752.269 815.474,759.772 804.839,759.772C696.583,759.772 451.082,759.772 336.651,759.772C324.477,759.772 313.272,751.184 307.422,737.371C301.573,723.557 302.01,706.716 308.562,693.441C368.166,572.685 492.957,319.861 544.198,216.049Z" style="fill:white;"/>
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </a>
                </div>

                <div class="footer_list foter_list_mobile">
                    <div class="carowsel carowsel_mobile">
                        
                        @foreach($listStory as $item)
                            
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
        </footer>


        
    </div>

    <div class="video_mobile_play hidden">
        <a class="close_video_popup"><img src="{{ asset('fe/media/close.png') }}" /></a>
        <video  controls playsinline>
            <source src="" type="video/mp4">
        </video>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('fe/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('fe/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('fe/js/vendor.min.js') }}"></script>
    <script src="{{ asset('fe/js/functions.js') }}"></script>
    <script src="{{ asset('fe/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    <script>
        function showVideo(_id) {
            $('.video_mobile_play video').attr('src',_id);
            $('.video_mobile_play').removeClass('hidden');
        }
        function toggelMuted() {
            $("#home_video_intro").prop('muted', false);
            $('.icon_sound i').removeClass('fa-volume-mute');
            $('.icon_sound i').addClass('fa-volume-down');
            
        }
        $(document).ready(function() {
            $('#home_video_intro').get(0).play();
            // $('#home_video_intro').get(0).muted(true);
            // $("#home_video_intro").prop('muted', false);
            // ('#home_video_intro').prop('muted', true)
        });
        $(document).ready(function() {
            
            
            $('.search_btn_toggle').on('click', function() {
                    $(".form_search_header").toggleClass('hidden');
            });
            if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
                || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
                $('.menu_btn_toggle').on('click', function() {
                    $(".box").animate({
                        width: "100vw"
                    }, 1000);
                });
                $(function(){
                    $( "body" ).bind( "tap", tapHandler );
                    function tapHandler( event ){
                        console.log("here");
                    }
                });
            } else {
                $('.menu_btn_toggle').on('click', function() {
                    $(".box").animate({
                        width: "350px"
                    }, 1000);
                });
                $('.openDirector').on('click', function() {
                    $('.absolu_footer_list').toggleClass('hidden');
                });
                
            }
            
            $(document).mouseup(function(e) {
                var container = $(".box");
                if (!container.is(e.target) && container.has(e.target).length === 0 && container.width() > 0) {
                    $(".box").animate({
                        width: "0px"
                    });
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

            // const slider = $(".carowsel_pc");
            // slider
            //   .slick({
            //     dots: true,
            //     slidesToShow: 4,
            //     slidesToScroll: 1,
            //     autoplay: false,
            //     autoplaySpeed: 2000
            //   });

            // slider.on('wheel', (function(e) {
            //   e.preventDefault();

            //   if (e.originalEvent.deltaY < 0) {
            //     $(this).slick('slickPrev');
            //   } else {
            //     $(this).slick('slickNext');
            //   }
            // }));

            $('.close_menu_box').on('click', function() {
                $(".box").animate({
                    width: "0px"
                });
            });
            $('.close_video_popup').on('click', function() {
                $('.video_mobile_play').addClass('hidden');
            });
            var $Carousel5 = $(".slide_mobile_mail .owl-carousel");
            $Carousel5.owlCarousel({
                loop: true,
                autoplay: $Carousel5.data("autoplay"),
                margin: 10,
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