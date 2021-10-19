@extends('fe.layouts.master')

@section('content')
<div class="home_content_image home_banner_video_full">
    <div class="fullSize">
        <img src="https://wallpaperaccess.com/full/869923.gif"/>
    </div>
    <div class="titleListDirectory">
        <!-- @foreach($listStoryLimit as $item)
                        <a href="/director-{{$item->id}}.html">{{$item->description}}<span>{{$item->khachhang}}</span></a>
                    @endforeach -->
        <a href="#" class="titleSlide">Đỗ Thái Tài</a>
        <a href="#" class="desSlide">Generalli</a>
        <i class="fas fa-arrow-down"></i>
    </div>
</div>
@endsection