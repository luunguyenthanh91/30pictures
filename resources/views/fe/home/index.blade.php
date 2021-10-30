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
            setTimeout(function() {
                // window.location.href = '/index.html'; 
            }, 13000);
        });
    </script>
    

</body>

</html>
<!-- 
<!DOCTYPE html>
<html>
<style>
@font-face {
    font-family: OswaldRegularSemiBold;
    src: url({{ asset('fe/fonts/Oswald-SemiBold.ttf') }});
}
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  background-image: url('http://30pictures.com/public/media/userfiles/files/FI4A2975.png');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: OswaldRegularSemiBold;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<body>

<div class="bgimg">
  <div class="topleft">
    <p><img src="http://30pictures.com/public/media/userfiles/files/logo.png"></p>
  </div>
  <div class="middle">
    <h1>COMING SOON</h1>
    <hr>
    <p id="demo"></p>
  </div>
  <div class="bottomleft">
  </div>
</div>
<script src="{{ asset('fe/js/vendor/jquery-3.4.1.min.js') }}"></script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("June 24, 2021 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</body>
</html> -->