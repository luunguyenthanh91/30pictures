<header>
    <div class="header_logo">
        <a href="/index.html"><img src="{{@url(Helper::getSetting(5)->image_pc)}}" /></a>
    </div>
    <div class="header_menu">
        <a class="menu_btn_toggle"><img src="{{ asset('fe/media/frame.png') }}" /></a>
    </div>
    <div class="header_search">
        <a class="search_btn_toggle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg></a>
        <form method="get" class="form_search_header hidden" action="/search.html">
            @csrf
            <input class="search_input" type="text" name="key" required placeholder="Director Video">
        </form>
    </div>

</header>