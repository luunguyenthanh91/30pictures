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
        @foreach($listStory as $key => $item)
            @if($key%3 == 0)
            <div class="pc_style_slide @if($key%6 > 2) slide-2 @endif">
            @endif
                @if($key%3 == 0)
                    <div class="video_big">
                        <a href="/video-{{$item->id}}.html" class="item" rel="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" >
                            <div class="block-1 block">
                                <img src="{{@url($item->image_pc ? $item->image_pc : '/' )}}" class="bg" alt="{{$item->name}}" />
                                <div class="bg_bg"></div>
                                <div class="desscription">{!! $item->description !!}</div>
                                <div class="seemore">See More ></div>
                                <div class="title_play">{{$item->name}}</div>
                                <div class="title_play_des">{{$item->meme}}</div>
                                
                            </div>
                        </a>
                    </div>
                @else
                    @if($key%3 == 1)
                    <div class="video_small">
                        <div class="video_content">
                    @endif
                        
                            <a id="item_scroll_{{$key}}" href="/video-{{$item->id}}.html" class="item" rel="{{@url($item->image_pc ? $item->image_pc  : '/' )}}" >
                                <div class="@if ($key == 0 || $key%2 == 0) block-1 @else block-2 @endif block">
                                    <img src="{{@url($item->image_pc ? $item->image_pc : '/' )}}" class="bg" alt="{{$item->name}}" />
                                    <div class="seemore">See More ></div>
                                    <div class="bg_bg"></div>
                                    <div class="title_play">{{$item->name}}</div>
                                    <div class="title_play_des">{{$item->meme}}</div>
                                </div>
                            </a>
                    @if($key%3 == 2 || $key == count($listStory) - 1)
                        </div>
                    </div>
                    @endif
                @endif
            @if($key%3 == 2 || $key == count($listStory) - 1)
            </div>
            @endif
            
        @endforeach
    </div>
</div>
@endsection
@section('before_footer_scripts')
<script>

</script>
@endsection