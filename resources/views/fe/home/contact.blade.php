@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - CONTACT')
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/contact.css') }}">
@endsection
@section('nav_title')
<div class="header_titleLogo">
    <p class="contentLogo">Contact</p>
</div>
@endsection
@section('class_body', "home_banner_video_crop_header")
@section('content')

<div class="home_content_image">
   <div class="contact">
        <div class="height-auto">
            <h1 class="titleTop">Information</h1>
            <h2 class="desTop">Hello, we are here!</h2>

            <h3 class="titleBox">Address</h3>
            <p class="dessBox">220/7 Phan Van Han Street,<br/>Ward 17, Binh Thanh District,<br/>Ho Chi Minh City, VN</p>
            <h3 class="titleBox">Email</h3>
            <p class="dessBox">{{Helper::getSetting(13)->description}}</p>
            <h3 class="titleBox">Phone Number</h3>
            <p class="dessBox">{{Helper::getSetting(12)->description}}</p>
        </div>
   </div>
   <div class="contactForm">
        <div class="height-auto">
            <h1 class="titleTop">Contact Us</h1>
            <h2 class="desTop">For more detailed information</h2>
            <form action="" method="POST" >
                @csrf
                
                @if($message != '')
                <div class="alert alert-success" role="alert">
                    {{$message}}
                </div>
                @endif
                <h3 class="titleBox">Name</h3>
                <input type="text" name='name' class="name_input nameIpt" required />
                <h3 class="titleBox">Email</h3>
                <input type="text" name='email' class="name_input emailIpt" required />
                <h3 class="titleBox">Phone Number</h3>
                <input type="text" name='phone' class="name_input phoneIpt" required />
                <h3 class="titleBox">Content</h3>
                <input type="text" name='content' class="name_input contentIpt" required />
                <button type="submit" class="btn_send sendBtn hidden">Send ></button>
            </form>
        </div>
   </div>
   <div class="contactInfo">
        <div class="height-auto">
            <h1 class="titleTop">See More</h1>
            <h2 class="desTop">Find us on social media</h2>
            <a href="{{Helper::getSetting(14)->description}}" target="_blank"  class="titleBox">FaceBook</a>
            <p class="dessBox"></p>
            <a href="{{Helper::getSetting(15)->description}}" target="_blank"  class="titleBox">Vimeo</a>
            <p class="dessBox"></p>
            <a href="{{Helper::getSetting(16)->description}}" target="_blank" class="titleBox">Youtube</a>
            <p class="dessBox"></p>
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.22105018289!2d106.70136231411652!3d10.79437476181544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b427886683%3A0xcb81f04ece98186!2zMjIwIFBoYW4gVsSDbiBIw6JuLCBQaMaw4budbmcgMTcsIELDrG5oIFRo4bqhbmgsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1635592125014!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
   </div>
</div>
@endsection
@section('before_footer_scripts')
    <script>
        $(document).ready(function() {
            $('.name_input').on('keyup', function(){
                var flag = 0;
                if ($('.nameIpt').val().length == 0) {
                    flag = 1;
                }
                if ($('.emailIpt').val().length == 0) {
                
                    flag = 1;
                }
                if ($('.phoneIpt').val().length == 0) {
                    flag = 1;
                }
                if ($('.contentIpt').val().length == 0) {
                    flag = 1;
                }

                if (flag == 1) {
                    $('.sendBtn').addClass('hidden');
                } else {
                    $('.sendBtn').removeClass('hidden');
                }
            });
        });
    </script>
@endsection