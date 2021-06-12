<div class="navbar navbar-expand navbar-dark border-bottom-2" id="default-navbar" data-primary>

    <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0" type="button" data-toggle="sidebar">
        <span class="material-icons">short_text</span>
    </button>

    <a href="/admin" class="navbar-brand mr-16pt d-lg-none">

        <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

            <span class="rounded"><img
                    src="{{ asset('assets/images/logofinish-1-7-13.png') }}" alt="logo" class="img-fluid" /></span>

        </span>

        <span class="d-none d-lg-block">Luma</span>
    </a>

    <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
        <li class="nav-item">
            <a href="/admin" class="nav-link"><img
                    src="{{ asset('assets/images/logofinish-1-7-13.png') }}" class="logo_menu" /></a>
        </li>
        
    </ul>

    <ul class="nav navbar-nav ml-auto mr-0">
        @if (!Auth::guard('admin')->check())
        <li class="nav-item active">
            <a href="/admin/authentication/login" class="nav-link" data-toggle="tooltip" data-title="Login" data-placement="bottom"
                data-boundary="window"><i class="material-icons">lock_open</i></a>
        </li>
        @endif
    </ul> 
</div> 