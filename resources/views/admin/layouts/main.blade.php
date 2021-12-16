<!DOCTYPE html>
<html lang="en" dir="ltr" class="dark-mode">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="{{ asset('assets/images/logo/black-100@2x.png') }}" type="image/x-icon"> <!-- Favicon-->
        <title>@yield('title') - {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description', config('app.name'))">
        <meta name="author" content="@yield('meta_author', config('app.name'))">
        @yield('meta')

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots" content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">
        <!-- Preloader -->
        <link type="text/css" href="{{ asset('assets/vendor/spinkit.css') }}" rel="stylesheet">
        <!-- Perfect Scrollbar -->
        <link type="text/css" href="{{ asset('assets/vendor/perfect-scrollbar.css') }}" rel="stylesheet">
        <!-- Material Design Icons -->
        <link type="text/css" href="{{ asset('assets/css/material-icons.css') }}" rel="stylesheet">
        <!-- Font Awesome Icons -->
        <link type="text/css" href="{{ asset('assets/css/fontawesome.css') }}" rel="stylesheet">
        <!-- Preloader -->
        <link type="text/css" href="{{ asset('assets/css/preloader.css') }}" rel="stylesheet">
        <!-- App CSS -->
        <link type="text/css" href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
        <!-- Dark Mode CSS -->
        <!-- <link type="text/css" href="{{ asset('assets/css/dark.css') }}" rel="stylesheet"> -->
        @stack('before-styles')
    
        @stack('after-styles')

        @if (trim($__env->yieldContent('page-styles')))    
            @yield('page-styles')
        @endif    
        @yield('before-styles')

    </head>

    

<body class="layout-app">
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        @yield('content')
    </div>

    <script>
    // // duyệt tất cả tấm ảnh cần lazy-load
    var lazyImages = document.querySelectorAll('[lazy]');

    // khi tấm ảnh gần chạm viewport (còn 100px nữa là chạm), thì load tấm ảnh ngay
    var threshold = 20;

    // tránh vấn đề về performance
    var timeout;

    function lazyload () {
    clearTimeout(timeout);

    timeout = setTimeout(function() {
        var scrollTop = window.pageYOffset;
        lazyImages.forEach(function(lazyImage) {
        var src = lazyImage.dataset.src;

        // khi vị trí tấm ảnh gần chạm viewport, load ngay
        if (lazyImage.offsetTop < (window.innerHeight + scrollTop + threshold)) {
            lazyImage.tagName.toLowerCase() === 'img'
            // <img>: copy data-src sang src
            ? lazyImage.src = src

            // <div>: copy data-src sang background-image
            : lazyImage.style.backgroundImage = "url(\'" + src + "\')";

            // copy xong rồi thì bỏ attribute lazy đi
            lazyImage.removeAttribute('lazy');
        }
        });

        // tất cả tấm ảnh đã được load xong, dọn dẹp và đi thôi.
        if (lazyImages.length == 0) { 
        document.removeEventListener('scroll', lazyload);
        }
    }, 10);
    }

    document.addEventListener('scroll', lazyload);
    </script>
    <!-- jQuery -->
    <script src="{{ asset('assets/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap.min.js') }}"></script>

    <!-- Perfect Scrollbar -->
    <script src="{{ asset('assets/vendor/perfect-scrollbar.min.js') }}"></script>

    <!-- DOM Factory -->
    <script src="{{ asset('assets/vendor/dom-factory.js') }}"></script>

    <!-- MDK -->
    <script src="{{ asset('assets/vendor/material-design-kit.js') }}"></script>

    <!-- App JS -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Preloader -->
    <script src="{{ asset('assets/js/preloader.js') }}"></script>

    <!-- Global Settings -->
    <script src="{{ asset('assets/js/settings.js') }}"></script>

    <!-- Moment.js -->
    <script src="{{ asset('assets/vendor/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/moment-range.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('assets/vendor/Chart.min.js') }}"></script>



    <!-- List.js -->
    <script src="{{ asset('assets/vendor/list.min.js') }}"></script>
    <script src="{{ asset('assets/js/list.js') }}"></script>

    <!-- Preloader -->
    <script src="{{ asset('assets/js/preloader.js') }}"></script>
    <script src="{{ asset('assets/js/vue.js') }}"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYGxyRPEonFu5qi3zw_h2C1IyWvAULAL0" type="text/javascript"></script> -->
    
    @yield('page-script')


</body>

</html>