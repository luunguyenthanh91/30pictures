@extends('fe.layouts.master')
@section('title', Helper::getSetting(1)->description . ' - STORY SELLERS - ' . @$story->description)
@section('css_page')
<link rel="stylesheet" href="{{ asset('fe/css/derector.css') }}">
@if($bgDirectory->description != '')
    <style>
        main {
            background: {{$bgDirectory->description}};
        }
    </style>
@endif
@endsection
@section('nav_title')
<div class="header_titleLogo">
    <p class="contentLogo">{{@$story->description}} | SHOWREEL</p>
</div>
@endsection
@section('class_body', "home_banner_video_crop_header")
@section('content')
<div class="bg_style">
    <div class="home_content_image">
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
</div>
@endsection
@section('before_footer_scripts')
<script>

</script>
@endsection