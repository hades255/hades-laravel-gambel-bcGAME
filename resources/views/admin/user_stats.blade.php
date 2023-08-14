<div id="__ajax_title" style="display: none">Statistics - Users</div>
<script src="{{ asset('/admin_assets/js/pages/user_s.js') }}" type="text/javascript"></script>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row row-no-padding row-col-separator-lg">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    Registered
                                </h4>
                                <span class="kt-widget24__desc">
					            Total
					        </span>
                            </div>

                            <span class="kt-widget24__stats kt-font-primary">
                                {{\DB::table('users')->where('chat_role', '<=', 3)->count()}}
                            </span>
                        </div>

                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-primary" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    In contact with
                                </h4>
                                <span class="kt-widget24__desc">
					            Registered through <i class="fab fa-vk"></i>
					        </span>
                            </div>

                            <span class="kt-widget24__stats kt-font-brand">
                               {{\DB::table('users')->where('email', null)->where('chat_role', '<=', 3)->count()}}
                            </span>
                        </div>

                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-brand" role="progressbar" style="width: {{100 - (\DB::table('users')->where('email', '!=', null)->where('chat_role', '<=', 3)->count()/\DB::table('users')->where('email', null)->where('chat_role', '<=', 3)->count())*100}}%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-4">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__info">
                                <h4 class="kt-widget24__title">
                                    mail
                                </h4>
                                <span class="kt-widget24__desc">
                                    Registered through <i class="fas fa-at"></i>
                                </span>
                            </div>

                            <span class="kt-widget24__stats kt-font-danger">
                                {{\DB::table('users')->where('email', '!=', null)->where('chat_role', '<=', 3)->count()}}
                            </span>
                        </div>

                        <div class="progress progress--sm">
                            <div class="progress-bar kt-bg-danger" role="progressbar" style="width: {{(\DB::table('users')->where('email', '!=', null)->where('chat_role', '<=', 3)->count()/\DB::table('users')->where('email', null)->where('chat_role', '<=', 3)->count())*100}}%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid ">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Registrations
                        </h3>
                    </div>
                   <div class="kt-portlet__head-toolbar">@php ($c = "$('#s-total').html($(this).html())") @endphp
<a href="javascript:void(0)" id="s-total" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                            Today
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">
                            <ul class="kt-nav">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item" onclick="swapUserData('a', __a_data_today_labels, __a_data_today, __a_data_today_count); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Today</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapUserData('a', __a_data_week_labels, __a_data_week, __a_data_week_count); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">A week</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapUserData('a', __a_data_month_labels, __a_data_month, __a_data_month_count); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Month</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapUserData('a', __a_data_3months_labels, __a_data_3months, __a_data_3months_count); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">3 months</span>
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                    <div class="kt-widget4 kt-widget4--sticky">
                        <div class="kt-widget4__items kt-portlet__space-x kt-margin-t-15">
                            <div class="kt-widget4__item">
                            <span class="kt-widget4__icon">
                                <i class=" kt-font-danger"></i>
                            </span>
                                <a href="javascript:void(0)" class="kt-widget4__title">
                                    Registrations for this period:
                                </a>
                                <span class="kt-widget4__number kt-font-danger" id="a-count"></span>
                            </div>
                        </div>
                        <div class="kt-widget4__chart kt-margin-t-50"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="a" style="height: 150px; display: block; width: 516px;" width="516" height="150" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
		if (window.location.href.indexOf('load')==-1) {
     window.location.replace(window.location.href+'?load');
} else {
            var __a_data_today_count = {{ \App\User::where('time', '>=', \Carbon\Carbon::today()->timestamp)->where('chat_role', '<=', 3)->count() }};
            var __a_data_today_labels = [
                @for($i = 0; $i <= 23; $i++)
                        @if(\Carbon\Carbon::now(new DateTimeZone("Etc/GMT-3"))->timestamp < \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->addHours($i)->timestamp) @continue @endif
                    '{{ $i.':00 - '.$i.':59' }}',
                @endfor
            ];
            var __a_data_today = [
                @for($i = 0; $i <= 23; $i++)
                {{ \App\User::where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->addHours($i)->timestamp)->where('time', '<=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->addHours($i+1)->timestamp)->where('chat_role', '<=', 3)->count() }},
                @endfor
            ];

            @php
                $fill_days = function($days) {
                    $out = '';
                    for($i = 0; $i < $days; $i++)
                        $out .= (\App\User::where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))
                            ->subDays($i + 1)->timestamp)->where('time', '<=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))
                            ->subDays($i)->timestamp)->where('chat_role', '<=', 3)->count()) .',';
                    return $out;
                };
                $fill_labels = function($days) {
                    $out = '';
                    for($i = 0; $i < $days; $i++)
                        $out .= '"'.($i > 0 ? $i .' д назад' : 'Today').'",';
                    return $out;
                };
            @endphp

            var __a_data_week_count = {{ \App\User::where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->subDays(6)->timestamp)->where('chat_role', '<=', 3)->count() }};
            var __a_data_week_labels = ['6 дней назад', '5 дней назад', '4 дня назад', '3 дня назад', '2 дня назад', 'Вчера', 'Today'];
            var __a_data_week = [{!! $fill_days(7) !!}].reverse();

            var __a_data_month_count = {{ \App\User::where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->subDays(29)->timestamp)->where('chat_role', '<=', 3)->count() }};
            var __a_data_month_labels = [{!! $fill_labels(31) !!}].reverse();
            var __a_data_month = [{!! $fill_days(31) !!}].reverse();

            var __a_data_3months_count = {{ \App\User::where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->subDays(29*3)->timestamp)->where('chat_role', '<=', 3)->count() }};
            var __a_data_3months_labels = [{!! $fill_labels(61) !!}].reverse();
            var __a_data_3months = [{!! $fill_days(61) !!}].reverse();

            loadUserData('a', '#AA88FF');
swapUserData('a', __a_data_today_labels, __a_data_today, __a_data_today_count); }
        </script>
    </div>
</div>
