

<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-black-dodger-blue sidebar-left" data-perfect-scrollbar>


            <!-- <a href="/admin" class="sidebar-brand ">

                <span class="avatar avatar-xl sidebar-brand-icon h-auto">

                    <span class="rounded "><img
                            src="{{ asset('assets/images/logofinish-1-7-13.png') }}" class="img-fluid"
                            alt="logo" /></span>

                </span>
                <span>AlphaCep Inc.</span>
            </a> -->

            <div class="sidebar-heading">Applications</div>
            <ul class="sidebar-menu">

                <li class="sidebar-menu-item {{ (request()->is('admin')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
                            Intro - SEO
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*home-page')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/home-page">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                            Trang Chủ
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*galary')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/galary">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                            Galary
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*about-page')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/about-page">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">thumbs_up_down</span>
                            Giới Thiệu
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*contact-page')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/contact-page">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">contact_support</span>
                            Liên Hệ
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*storys*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/storys">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">collections</span>
                        STORY SELLERS
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*blog*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/blog">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">collections</span>
                        Blog
                    </a>
                </li>
                <!-- <li class="sidebar-menu-item {{ (request()->is('admin')) ? 'active open' : '' }} {{ (request()->is('*customer*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/customer">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">supervisor_account</span>
                            Customer
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*list-vote*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/list-vote">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">supervisor_account</span>
                            Customer Votes
                    </a>
                </li> -->
                <!-- <li class="sidebar-menu-item {{ (request()->is('*company*')) ? 'active open' : '' }} {{ (request()->is('*/report')) ? 'active open' : '' }} {{ (request()->is('*chart-report*')) ? 'active open' : '' }}">
                    <a class="sidebar-menu-button js-sidebar-collapse collapsed" data-toggle="collapse" href="#report" aria-expanded="false">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home_work</span>
                        通訳派遣管理
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu sm-indent collapse" id="report" style="">

                        <li class="sidebar-menu-item {{ (request()->is('*company*')) ? 'active open' : '' }} ">
                            <a class="sidebar-menu-button" href="/admin/company">

                                <span class="sidebar-menu-text">案件管理</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ (request()->is('*/report')) ? 'active open' : '' }}">
                            <a class="sidebar-menu-button" href="/admin/report">

                                <span class="sidebar-menu-text">カレンダー</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ (request()->is('*chart-report*')) ? 'active open' : '' }}">
                            <a class="sidebar-menu-button" href="/admin/chart-report">

                                <span class="sidebar-menu-text">集計</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="sidebar-menu-item {{ (request()->is('*collaborators*')) ? 'active open' : '' }} {{ (request()->is('*report-day*')) ? 'active open' : '' }} {{ (request()->is('*report-district*')) ? 'active open' : '' }}">
                    <a class="sidebar-menu-button js-sidebar-collapse collapsed" data-toggle="collapse" href="#report-col" aria-expanded="false">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">supervisor_account</span>
                        通訳者管理
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu sm-indent collapse" id="report-col" style="">

                        <li class="sidebar-menu-item {{ (request()->is('*collaborators')) ? 'active open' : '' }} ">
                            <a class="sidebar-menu-button" href="/admin/collaborators">

                                <span class="sidebar-menu-text">通訳者一覧</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ (request()->is('*report-day*')) ? 'active open' : '' }}">
                            <a class="sidebar-menu-button" href="/admin/collaborators/report-day">

                                <span class="sidebar-menu-text">日付集計</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ (request()->is('*report-district*')) ? 'active open' : '' }}">
                            <a class="sidebar-menu-button" href="/admin/collaborators/report-district">

                                <span class="sidebar-menu-text">都道府県集計</span>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="sidebar-menu-item {{ (request()->is('*ctvjobs*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/ctvjobs">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">supervisor_account</span>
                        営業者管理
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*cusjobs*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/cusjobs">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">supervisor_account</span>
                        顧客管理
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*my-bank*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/my-bank">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">credit_card</span>
                            Bank Account
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*mails*')) ? 'active open' : '' }} ">
                    <a class="sidebar-menu-button" href="/admin/mails">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">email</span>
                            Mail Template
                    </a>
                </li>
                <li class="sidebar-menu-item {{ (request()->is('*chi*')) ? 'active open' : '' }}">
                    <a class="sidebar-menu-button js-sidebar-collapse collapsed" data-toggle="collapse" href="#report-money" aria-expanded="false">
                        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left icon-image-preview">money</span>
                        Chi Tiêu
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu sm-indent collapse" id="report-money" style="">

                        <li class="sidebar-menu-item {{ (request()->is('*chi/list')) ? 'active open' : '' }} ">
                            <a class="sidebar-menu-button" href="/admin/chi/list">

                                <span class="sidebar-menu-text">Danh Sách</span>
                            </a>
                        </li>

                    </ul>
                </li> -->

                
            </ul>

            <!-- // END Sidebar Content -->

        </div>
    </div>
</div>