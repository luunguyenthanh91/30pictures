<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Helper::getSetting(1)->description}}</title>
    <meta property="og:url" content="{{@url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{Helper::getSetting(1)->description}}">
    <meta property="og:description" content="{{Helper::getSetting(2)->description}}">
    <meta property="og:image" content="{{@url(Helper::getSetting(4)->image_pc)}}">
    <meta name="description" content="This is the website description. Nice eh?">
    <meta itemprop="name" content="{{Helper::getSetting(1)->description}}">
    <meta itemprop="description" content="{{Helper::getSetting(2)->description}}">
    <meta itemprop="image" content="{{@url(Helper::getSetting(4)->image_pc)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{Helper::getSetting(1)->description}}">
    <meta name="twitter:description" content="{{Helper::getSetting(2)->description}}">
    <meta name="twitter:image" content="{{@url(Helper::getSetting(4)->image_pc)}}">
    <meta name="keywords" content="{{Helper::getSetting(1)->description}}">
    <meta name="description" content="{{Helper::getSetting(2)->description}}">
    <meta name="author" content="tivatheme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{{ asset('fe/media/favico_icon.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CSource+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet" />
    <link href="{{ asset('fe/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('fe/css/vendor/jquery-ui.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('fe/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/pc.css') }}">
    <link rel="stylesheet" href="{{ asset('fe/css/mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fe/slick/slick-theme.css') }}">
</head>

<body class="nk-body">

    <div class="video_intro">
        <img id="video_intro" src="{{@url(Helper::getSetting(6)->file)}}" />
    </div>
    <script src="{{ asset('fe/js/vendor/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('fe/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('fe/js/vendor.min.js') }}"></script>
    <script src="{{ asset('fe/js/functions.js') }}"></script>
    <script src="{{ asset('fe/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
    
    <script>
        function showVideo(_id) {
            $('.video_mobile_play').removeClass('hidden');
        }
        $(document).ready(function() {
            // setTimeout(function() {
            //     window.location.href = '/index.html'; 
            // }, 13000);
        });
    </script>
    

</body>

</html>
