<div class="box">
    <div class="menu_mail_left">
        <a class="close_menu_box">
            Close 
            <i class="fas fa-chevron-right"></i>
        </a>
        <div class="logo_menu">
            <a href="/home"><img src="{{@url(Helper::getSetting(3)->image_pc)}}" /></a>
        </div>
        <div class="menuList">
            @foreach(Helper::getMenu() as $menuItem)
            <div class="menu_item">
                <a href="{{@$menuItem['url']}}">
                    <p class="title">{{ @$menuItem['name'] }}</p>
                    <p class="description">{{ @$menuItem['description'] }}</p>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</div>