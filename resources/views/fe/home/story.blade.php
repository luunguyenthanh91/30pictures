@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - STORY SELLERS')
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/story.css') }}">
@if($bgStory->description != '')
    <style>
        main {
            background: {{$bgStory->description}};
        }
    </style>
@endif
@endsection
@section('nav_title')
<div class="header_titleLogo">
    <p class="contentLogo">STORYSELLERS</p>
</div>
@endsection
@section('class_body', "home_banner_video_crop_header")
@section('content')
<div class="bg_style">
    <div class="home_content_image">
        <div class="pc_style_slide">
            @foreach($listStory as $key => $item)
            <div class="item @if ($key%3 == 1) first @endif @if ($key%3 == 2) last @endif ">
                <a rel="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" href="/director-{{$item->id}}.html" class="@if ($key == 0 || $key%2 == 0) block-1 @else block-2 @endif block">
                    @if ($key%2 == 0)
                    <img src="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" class="image_size" alt="{{$item->description}}" />
                    <div class="box_info">
                        <p class="title">{{$item->description}}</span></p>
                        <p class="description">View Showreel - Projects ></p>
                    </div>
                    @else
                    <div class="box_info">
                        <p class="title">{{$item->description}}</span></p>
                        <p class="description">View Showreel - Projects ></p>
                    </div>
                    <img src="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" class="image_size" alt="{{$item->description}}" />
                    @endif

                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>

</script>
@endsection