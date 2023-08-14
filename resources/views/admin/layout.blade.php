<!DOCTYPE html>
<?php ini_set('memory_limit', '256M');?>
<html lang="ru">
<head>
    <base href="">
    <meta charset="utf-8" />
    <title>{{$settings->namesite}}</title>
    <meta name="description" content="{{$settings->namesite}} - Administration">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin_assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/admin_assets/css/skins/header/base/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets/css/skins/header/menu/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets/css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin_assets/css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="{{ asset('/img/logo.jpg') }}" />

    <script src="{{ asset('/admin_assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/admin_assets/js/scripts.bundle.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('/js/vendor/jquery.nanoscroller.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/vendor/socket.io-1.4.5.js') }}"></script>
    <script type="text/javascript" src="{{ mix('/js/app.js') }}"></script>
</head>
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
</div>
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
            <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="javascript:void(0)" onclick="load('/admin')">
                        {{$settings->namesite}}
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                            </g>
                        </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
                                <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                            </g>
                        </svg></span>
                    </button>
                </div>
            </div>
            <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                <div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                    <ul class="kt-menu__nav ">
                        @if(Auth::user()->chat_role >= 3)
                            <li class="kt-menu__item kt-menu__item--submenu @if(Request::url() == url('/').'/admin' || Request::url() == url('/').'/admin/game_stats' || Request::url() == url('/').'/admin/user_stats') kt-menu__item--open @endif" data-option="admin/" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:void(0)" class="kt-menu__link kt-menu__toggle">
                                    <span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                        </g></svg>
                                    </span>
                                <span class="kt-menu__link-text">Statistics</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item" data-option="admin/" onclick="location.href='/admin'" aria-haspopup="true">
                                            <span class="kt-menu__link"><span class="kt-menu__link-text">Home</span></span>
                                        </li>
                                        <li class="kt-menu__item" data-option="admin/game_stats" onclick="load('/admin/game_stats')" aria-haspopup="true">
                                            <span class="kt-menu__link"><span class="kt-menu__link-text">Games</span></span>
                                        </li>
                                        <li class="kt-menu__item" data-option="admin/user_stats" onclick="load('/admin/user_stats')" aria-haspopup="true">
                                            <span class="kt-menu__link"><span class="kt-menu__link-text">Users</span></span>
                                        </li>
                                        <li class="kt-menu__item" data-option="admin/notification_stats" onclick="location.href='/admin/notification_stats'">
                                            <span class="kt-menu__link"><span class="kt-menu__link-text">Notifications</span></span>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Settings</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <li class="kt-menu__item" data-option="admin/settings" aria-haspopup="true"><a href="javascript:void(0)" onclick="location.href='/admin/settings'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" /></g>
                                </svg></span><span class="kt-menu__link-text">Settings</span></a>
                            </li>
                            <li class="kt-menu__item" data-option="admin/adjustments" aria-haspopup="true"><a href="javascript:void(0)" onclick="location.href='/admin/adjustments'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5" />
                                    <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5" />
                                    <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5" />
                                    <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5" />
                                </g></svg></span><span class="kt-menu__link-text">Games</span></a>
                            </li>
							<li class="kt-menu__item" data-option="admin/cases" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="location.href='/admin/cases'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
							<i class="fad fa-box-open"></i>
							</span><span class="kt-menu__link-text">Cases</span></a>
                            </li>
								@if($settings->techworks === 0)
							<li class="kt-menu__item" data-option="admin/tasks" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="location.href='/admin/tasks'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
							<i class="fas fa-tasks"></i>
							</span><span class="kt-menu__link-text">Tasks</span></a>
                            </li>
							@endif
                        @endif
                        <li class="kt-menu__section ">
                            <h4 class="kt-menu__section-text">Control</h4>
                            <i class="kt-menu__section-icon flaticon-more-v2"></i>
                        </li>
                        <li class="kt-menu__item" data-option="admin/promo" aria-haspopup="true"><a href="javascript:void(0)" onclick="location.href='/admin/promo'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M16.0322024,5.68722152 L5.75790403,15.945742 C5.12139076,16.5812778 5.12059836,17.6124773 5.75613416,18.2489906 C5.75642891,18.2492858 5.75672377,18.2495809 5.75701875,18.2498759 L5.75701875,18.2498759 C6.39304347,18.8859006 7.42424328,18.8859006 8.060268,18.2498759 C8.06056298,18.2495809 8.06085784,18.2492858 8.0611526,18.2489906 L18.3196731,7.9746922 C18.9505124,7.34288268 18.9501191,6.31942463 18.3187946,5.68810005 L18.3187946,5.68810005 C17.68747,5.05677547 16.6640119,5.05638225 16.0322024,5.68722152 Z" fill="#000000" fill-rule="nonzero"/>
                                    <path d="M9.85714286,6.92857143 C9.85714286,8.54730513 8.5469533,9.85714286 6.93006028,9.85714286 C5.31316726,9.85714286 4,8.54730513 4,6.92857143 C4,5.30983773 5.31316726,4 6.93006028,4 C8.5469533,4 9.85714286,5.30983773 9.85714286,6.92857143 Z M20,17.0714286 C20,18.6901623 18.6898104,20 17.0729174,20 C15.4560244,20 14.1428571,18.6901623 14.1428571,17.0714286 C14.1428571,15.4497247 15.4560244,14.1428571 17.0729174,14.1428571 C18.6898104,14.1428571 20,15.4497247 20,17.0714286 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg></span><span class="kt-menu__link-text">Promo codes</span></a>
                        </li>
                      <!--  <li class="kt-menu__item" data-option="admin/promo_list" aria-haspopup="true"><a href="javascript:void(0)" onclick="load('/admin/promo_list')" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <polygon fill="#000000" opacity="0.3" points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>
                                    <polygon fill="#000000" points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>
                                    <path d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866" fill="#000000" opacity="0.3"/>
                                    <path d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg></span><span class="kt-menu__link-text">Promo codes - Bot</span></a>
                        </li> --->
                        @if(Auth::user()->chat_role >= 3)
                            <li class="kt-menu__item" data-option="admin/users" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="load('/admin/users')" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3" />
                                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000" />
                                </g></svg></span><span class="kt-menu__link-text">Users</span></a>
                            </li>
							<li class="kt-menu__item" data-option="admin/fakes" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="load('/admin/fakes')" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
							<i class="icon-blackjack"></i>
							</span><span class="kt-menu__link-text">Fakes</span></a>
                            </li>
							<li class="kt-menu__item" data-option="admin/withdraws" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="load('/admin/withdraws')" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
							<i class="fas fa-comments-dollar"></i>
							</span><span class="kt-menu__link-text">Payouts</span></a>
                            </li>
							<li class="kt-menu__item" data-option="admin/payments" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="load('/admin/payments')" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
							<i class="fas fa-shopping-cart"></i>
							</span><span class="kt-menu__link-text">Refills</span></a>
                            </li>
                            <li class="kt-menu__item" data-option="admin/actions" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="location.href='/admin/actions'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path d="M6,18 L9,18 C9.66666667,18.1143819 10,18.4477153 10,19 C10,19.5522847 9.66666667,19.8856181 9,20 L4,20 L4,15 C4,14.3333333 4.33333333,14 5,14 C5.66666667,14 6,14.3333333 6,15 L6,18 Z M18,18 L18,15 C18.1143819,14.3333333 18.4477153,14 19,14 C19.5522847,14 19.8856181,14.3333333 20,15 L20,20 L15,20 C14.3333333,20 14,19.6666667 14,19 C14,18.3333333 14.3333333,18 15,18 L18,18 Z M18,6 L15,6 C14.3333333,5.88561808 14,5.55228475 14,5 C14,4.44771525 14.3333333,4.11438192 15,4 L20,4 L20,9 C20,9.66666667 19.6666667,10 19,10 C18.3333333,10 18,9.66666667 18,9 L18,6 Z M6,6 L6,9 C5.88561808,9.66666667 5.55228475,10 5,10 C4.44771525,10 4.11438192,9.66666667 4,9 L4,4 L9,4 C9.66666667,4 10,4.33333333 10,5 C10,5.66666667 9.66666667,6 9,6 L6,6 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                </svg></span><span class="kt-menu__link-text">Activity Log</span></a>
                            </li>
                            <li class="kt-menu__item" data-option="admin/notifications" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:void(0)" onclick="location.href='/admin/notifications'" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path d="M17,12 L18.5,12 C19.3284271,12 20,12.6715729 20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 C4,12.6715729 4.67157288,12 5.5,12 L7,12 L7.5582739,6.97553494 C7.80974924,4.71225688 9.72279394,3 12,3 C14.2772061,3 16.1902508,4.71225688 16.4417261,6.97553494 L17,12 Z" fill="#000000"/>
                                        <rect fill="#000000" opacity="0.3" x="10" y="16" width="4" height="4" rx="2"/>
                                    </g>
                                </svg></span><span class="kt-menu__link-text">Notifications</span></a>
                            </li>
                            <li class="kt-menu__section ">
                                <h4 class="kt-menu__section-text">Server</h4>
                                <i class="kt-menu__section-icon flaticon-more-v2"></i>
                            </li>
                            <li class="kt-menu__item" data-option="admin/logs" aria-haspopup="true"><a href="/admin/logs" target="_blank" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4.5,21 L21.5,21 C22.3284271,21 23,20.3284271 23,19.5 L23,8.5 C23,7.67157288 22.3284271,7 21.5,7 L11,7 L8.43933983,4.43933983 C8.15803526,4.15803526 7.77650439,4 7.37867966,4 L4.5,4 C3.67157288,4 3,4.67157288 3,5.5 L3,19.5 C3,20.3284271 3.67157288,21 4.5,21 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M2.5,19 L19.5,19 C20.3284271,19 21,18.3284271 21,17.5 L21,6.5 C21,5.67157288 20.3284271,5 19.5,5 L9,5 L6.43933983,2.43933983 C6.15803526,2.15803526 5.77650439,2 5.37867966,2 L2.5,2 C1.67157288,2 1,2.67157288 1,3.5 L1,17.5 C1,18.3284271 1.67157288,19 2.5,19 Z" fill="#000000"/>
                                </g>
                            </svg></span><span class="kt-menu__link-text">Logs</span>
                                    <span class="kt-menu__link-badge bigger-badge">
                                 <span class="kt-badge kt-badge--danger kt-badge--inline">
                                       {{ App::make(\Arcanedev\LogViewer\Contracts\LogViewer::class)->total() }}
                                 </span>
                             </span>
                                </a>
                            </li>
                            <li class="kt-menu__item" data-toggle="modal" data-target="#obf" aria-haspopup="true"><a href="javascript:void(0)" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M1,12 L1,14 L6,14 L6,12 L1,12 Z M0,10 L20,10 C20.5522847,10 21,10.4477153 21,11 L21,15 C21,15.5522847 20.5522847,16 20,16 L0,16 C-0.55228475,16 -1,15.5522847 -1,15 L-1,11 C-1,10.4477153 -0.55228475,10 0,10 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 13.000000) rotate(-225.000000) translate(-10.000000, -13.000000) "/>
                                    <path d="M17.5,12 L18.5,12 C18.7761424,12 19,12.2238576 19,12.5 L19,13.5 C19,13.7761424 18.7761424,14 18.5,14 L17.5,14 C17.2238576,14 17,13.7761424 17,13.5 L17,12.5 C17,12.2238576 17.2238576,12 17.5,12 Z M20.5,9 L21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 L20.5,11 C20.2238576,11 20,10.7761424 20,10.5 L20,9.5 C20,9.22385763 20.2238576,9 20.5,9 Z M21.5,13 L22.5,13 C22.7761424,13 23,13.2238576 23,13.5 L23,14.5 C23,14.7761424 22.7761424,15 22.5,15 L21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,13.5 C21,13.2238576 21.2238576,13 21.5,13 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg></span><span class="kt-menu__link-text">Assembly</span>
                                    <span class="kt-menu__link-badge bigger-badge">
                                 <span class="kt-badge kt-badge--brand kt-badge--inline">
                                    {{ json_decode(file_get_contents(base_path('package.json')))->version }}
                                 </span>
                             </span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
                <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                        <ul class="kt-menu__nav "></ul>
                    </div>
                </div>
                <div class="kt-header__topbar">
                    @if(Auth::user()->chat_role >= 3)
                        <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip" title="Игры" data-placement="right">
                            <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                        <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                        </div>
                    @endif
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">
                        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                            <div class="kt-header__topbar-user">
                                <span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->username}}</span>
                                <img alt="Pic" src="{{Auth::user()->avatar}}" />
                            </div>
                        </div>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
                            <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/admin_assets/media/misc/bg-1.jpg)">
                                <div class="kt-user-card__avatar">
                                    <img alt="Pic" src="{{Auth::user()->avatar}}" />
                                </div>
                                <div class="kt-user-card__name">
                                    {{Auth::user()->username}}
                                </div>
                            </div>

                            <div class="kt-notification">
                                <div class="kt-notification__custom kt-space-between">
                                    <a onclick="location.href='/logout'" class="btn btn-label btn-label-brand btn-sm btn-bold">Log off</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                <div class="kt-subheader  kt-grid__item" id="kt_subheader">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-subheader__main">
                            <h3 class="kt-subheader__title" id="ajax_title"></h3>
                            <div id="ajax_action" style="display: none"></div>
                        </div>
                        <div class="kt-subheader__toolbar">
                            <a href="javascript:void(0)" style="opacity: 0; cursor: default"></a>
                            <div id="ajax_toolbar" style="display: none"></div>
                        </div>
                    </div>
                </div>

                <div id="_ajax_content_">
                    {!! html_entity_decode($page) !!}
                </div>
            </div>

            <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                <div class="kt-container  kt-container--fluid ">
                    <div class="kt-footer__copyright">
                        2019-2020&nbsp;&copy;&nbsp;<a onclick="location.href='/'" target="_blank" class="kt-link">{{$settings->namesite}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="kt_quick_panel" class="kt-quick-panel">
    <a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
    <div class="kt-quick-panel__nav">
        <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x" role="tablist">
            <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Games</a>
            </li>
        </ul>
    </div>
    <div class="kt-quick-panel__content">
        <div class="tab-content">
            <div class="tab-pane kt-quick-panel__content-padding-x fade show active kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
                <form class="kt-form">
                    <div class="kt-heading kt-heading--sm kt-heading--space-sm">Enable/disable games</div>

                    @php
                    $games = array(
                        "mines" => 'Mines',
                        "wheel" => 'Wheel',
                        "crash" => 'Crash',
                        "dice" =>  'Dice',
                        "coinflip" => 'Coinflip',
                        "hilo" => 'HiLo',
                        "blackjack" => 'Blackjack',
                        "tower" => 'Tower',
                        "roulette" => 'Roulette',
                        "stairs" => 'Stairs',
                        "cases" => 'Кейсы',
                        "keno" => 'Keno',
						"plinko" => 'Plinko'
                    );
                    @endphp
                    @foreach($games as $key => $value)
                        <div class="form-group form-group-xs row" id="switch_{{$key}}">
                            <label class="col-8 col-form-label">{{$value}}</label>
                            <div class="col-4 kt-align-right">
                            <span class="kt-switch kt-switch--danger kt-switch--sm">
                                <label>
                                    <input onchange="send('#switch_{{$key}}', '/admin/toggle_game/{{$key}}')" type="checkbox" @if(!\App\Game::isDisabled($key)) checked="checked" @endif>
                                    <span></span>
                                </label>
                            </span>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>


<script>
if (location.protocol !== "https:") {
  location.protocol = "https:";
}
</script>

<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#5d78ff",
                "dark": "#282a3c",
                "light": "#ffffff",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": [
                    "#c5cbe3",
                    "#a1a8c3",
                    "#3d4465",
                    "#3e4466"
                ],
                "shape": [
                    "#f0f3ff",
                    "#d9dffa",
                    "#afb4d4",
                    "#646c9a"
                ]
            }
        }
    };
</script>

<script src="{{ asset('/admin_assets/js/admin_general.js') }}" type="text/javascript"></script>

</body>
</html>
