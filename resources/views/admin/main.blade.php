<div id="__ajax_title" style="display: none">Statistics</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @if(Auth::user()->chat_role < 3)
		<style>
      h7 { text-align:center; }
      p.date { text-align:right; }
      p.main { text-align:justify; } /*justify value stretch text to fit width*/
      p { text-indent:30px; } /*set the indent size for the first line of a paragraph*/
    </style>
      <div class="kt-portlet__head-title h7">
                                  You do not have access to this information
                            </div>
							<script> window.location.replace("/admin/promo"); </script>
    @else
        <div class="row">
            <div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
                <div class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--skin-solid kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__head--noborder kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Earned
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-widget17">
                            <div class="kt-widget17__visual kt-widget17__visual--chart kt-portlet-fit--top kt-portlet-fit--sides" style="background-color: #fd397a">
                                <div class="kt-widget17__chart" style="height:320px;">
                                    <canvas id="kt_chart_activities"></canvas>
                                </div>
                            </div>
                            <script type="text/javascript">
                                var _pay_stats_days = [];
                                var _pay_stats_values = [];
                                @php
                                    $wrap = function($s) {
                                        if($s == null || $s <= 0) $s = '0';
                                        return $s;
                                    };
                                    $today = \DB::table('payments')->where('time', '>=', \Carbon\Carbon::today(new DateTimeZone("Etc/GMT-3"))->timestamp)->where('status', 1)->where('type', 0)->sum('amount');
                                    $week = \DB::table('payments')->where('time', '>=', \Carbon\Carbon::now(new DateTimeZone("Etc/GMT-3"))->subDays(7)->timestamp)->where('status', 1)->where('type', 0)->sum('amount');
                                    $month = \DB::table('payments')->where('time', '>=', \Carbon\Carbon::now(new DateTimeZone("Etc/GMT-3"))->subDays(30)->timestamp)->where('status', 1)->where('type', 0)->sum('amount');
                                    $summary = \DB::table('payments')->where('status', 1)->where('type', 0)->sum('amount');

                                    $days = ''; $values = '';
                                    for($i = 0; $i < 9; $i++) {
                                        $text = $i == 8 ? 'Today' : (8 - $i) .' d. back';
                                        echo "_pay_stats_days.push('$text');";
                                        echo "_pay_stats_values.push(".$wrap(\DB::table('payments')
                                            ->where('time', '>=', \Carbon\Carbon::now(new DateTimeZone("Etc/GMT-3"))->subDays((8-$i)+1)->timestamp)
                                            ->where('time', '<=', \Carbon\Carbon::now(new DateTimeZone("Etc/GMT-3"))->subDays(8-$i)->timestamp)->where('status', 1)->where('type', 0)->sum('amount')).");";
                                    }
                                @endphp
                            </script>

                            <div class="kt-widget17__stats">
                                <div class="kt-widget17__items">
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__title">
                                            {{$wrap($today)}} USD.
                                        </span>
                                        <span class="kt-widget17__subtitle">
                                            Today
                                        </span>
                                    </div>
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__title">
                                            {{$wrap($week)}} USD.
                                        </span>
                                        <span class="kt-widget17__subtitle">
                                            A week
                                        </span>
                                    </div>
                                </div>
                                <div class="kt-widget17__items">
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__title">
                                            {{$wrap($month)}} USD.
                                        </span>
                                        <span class="kt-widget17__subtitle">
                                            Month
                                        </span>
                                    </div>
                                    <div class="kt-widget17__item">
                                        <span class="kt-widget17__title">
                                            {{$wrap($summary)}} USD.
                                        </span>
                                        <span class="kt-widget17__subtitle">
                                            All the time
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 order-lg-3 order-xl-1">
                <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Check
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab1_content" role="tab">
                                        Payouts
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab2_content" role="tab">
                                        Refills
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body" style="min-height: 540px">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_widget4_tab1_content">
                                <div class="kt-widget4">
                                    @php
                                        $opens = \DB::table('withdraw')->orderBy('id', 'asc')->where('status', 0)->get();
                                        foreach ($opens as $live) $live->user = \App\User::where('id', $live->user_id)->first();
                                    @endphp
                                    @if(sizeof($opens) == 0)
                                        <div class="empty_block">
                                            <i class="fas fa-clock"></i>
                                            <div>There's nothing here</div>
                                        </div>
                                    @else
                                        @foreach($opens as $live)
                                            @if($live->user == null || $live->status == 4) @continue @endif
                                            <div id="with_{{$live->id}}" class="kt-widget4__item">
                                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                    <img src="{{$live->user->avatar}}" alt="">
                                                </div>
                                                <div class="kt-widget4__info">
                                                    <a href="javascript:void(0)" onclick="load('/admin/user?id={{$live->user->id}}')" class="kt-widget4__username">
                                                        {{$live->user->username}} <i class="fas fa-angle-right"></i> {{$live->user->money}} USD.
                                                    </a>
                                                    <p class="kt-widget4__text" style="font-family: 'Open Sans', sans-serif">
                                                        {{$live->amount}} USD. <i class="fal fa-angle-right"></i> {{\App\Http\Controllers\GeneralController::formatDate(strtotime($live->created_at))}}
                                                        <br>
                                                        @php 
														$s = '' 
														@endphp
                                                        @if($live->system == 4)
                                                            QIWI
                                                            @php
															$s = 'Qiwi' 
															@endphp
                                                        @elseif($live->system == 5)
                                                            Yandex money
                                                            @php
															$s = 'Yandex money'
															@endphp
                                                        @elseif($live->system == 6)
                                                            Megaphone
                                                            @php
															$s = 'Megaphone'
															@endphp
                                                        @elseif($live->system == 7)
                                                            Tele2
                                                            @php
															$s = 'Tele2'
															@endphp
                                                        @elseif($live->system == 8)
                                                            МТС
                                                            @php
															$s = 'МТС'
															@endphp
                                                        @elseif($live->system == 9)
                                                            Beeline
                                                            @php
															$s = 'Beeline'
															@endphp
                                                        @endif
                                                        {{$live->wallet}}
                                                    </p>
                                                </div>
                                                <div class="kt-widget2__actions">
                                                    <a href="#" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right" style="">
                                                        @php
														$message_send_script = "socket.emit('send payout label-1', JSON.stringify({user_id: ".$live->user->id.",username:'".$live->user->username."',avatar:'".$live->user->avatar."',sum:".$live->amount.",pay:'".$s."'}))"
														@endphp
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:void(0)" onclick="send('#with_{{$live->id}}', '/admin/accept_withdraw/{{$live->id}}', function() { $('#with_{{$live->id}}').fadeOut('fast'); {{$message_send_script}} })" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-check-mark"></i>
                                                                    <span class="kt-nav__link-text">pay out</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:void(0)" onclick="send('#with_{{$live->id}}', '/admin/decline_withdraw/{{$live->id}}', function() { $('#with_{{$live->id}}').fadeOut('fast'); })" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon2-cross"></i>
                                                                    <span class="kt-nav__link-text">Refuse</span>
                                                                </a>
                                                            </li>
                                                            <li class="kt-nav__item">
                                                                <a href="javascript:void(0)" onclick="send('#with_{{$live->id}}', '/admin/ignore_withdraw/{{$live->id}}', function() { $('#with_{{$live->id}}').fadeOut('fast'); })" class="kt-nav__link">
                                                                    <i class="kt-nav__link-icon flaticon-delete"></i>
                                                                    <span class="kt-nav__link-text">Ignore</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
							<div class="tab-pane" id="kt_widget4_tab2_content">
                                <div class="kt-widget4">
                                    @php
                                        $opens = \DB::table('payments')->orderBy('id', 'desc')->where('status', 1)->limit(9)->get();
                                        foreach ($opens as $live) $live->user = \App\User::where('id', $live->user)->first();
                                    @endphp
                                    @if(sizeof($opens) == 0)
                                        <div class="empty_block">
                                            <i class="fas fa-clock"></i>
                                            <div>There's nothing here</div>
                                        </div>
                                    @endif
                                    @foreach($opens as $live)
                                        <div id="with_{{$live->id}}" class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                <img src="{{$live->user->avatar}}" alt="">
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a href="javascript:void(0)" onclick="load('admin/user?id={{$live->user->id}}')" class="kt-widget4__username">
                                                    {{$live->user->username}}
                                                </a>
                                                <p class="kt-widget4__text">
                                                    +{{$live->amount}} USD. <i class="fal fa-angle-right"></i> ({{$live->type}}) <br> {{\App\Http\Controllers\GeneralController::formatDate(strtotime($live->created_at))}}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">
			@php
    $loadScript = '';
    $games = array(
        1 => array("name" => "Dice", "color" => "#5d78ff"),
        2 => array("name" => "Wheel", "color" => "#5867dd"),
        3 => array("name" => "Crash", "color" => "#34bfa3"),
        4 => array("name" => "Coinflip", "color" => "#36a3f7"),
        5 => array("name" => "Mines", "color" => "#ffb822"),
        7 => array("name" => "HiLo", "color" => "#c5cbe3"),
        8 => array("name" => "Blackjack", "color" => "#e74c3c"),
        9 => array("name" => "Tower", "color" => "#8e44ad"),
        10 => array("name" => "Roulette", "color" => "#aa88ff"),
        11 => array("name" => "Stairs", "color" => "#88aaff"),
        12 => array("name" => "Кейсы", "color" => "#ee88ff"),
		13 => array("name" => "Plinko", "color" => "#32d0d0"),
        14 => array("name" => "Keno", "color" => "#daa421")
    );
						$ids = (\App\User::where('chat_role', '<=', 3)->get()->pluck('id'));
@endphp
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header">
                                    <h3 class="kt-widget14__title">
                                        Game popularity
                                        <script type="text/javascript">
                                            var __popularity_data = [
                                                @foreach($games as $id => $name)
                                                    {{\App\Game::where('game_id', $id)->where('user_id', $ids)->count()}},
                                                @endforeach
                                            ];
                                            var __game_names = [
                                                @foreach($games as $id => $name)
                                                    '{{$name['name']}}',
                                                @endforeach
                                            ];
                                            var __game_colors = [
                                                @foreach($games as $id => $name)
                                                    '{{$name['color']}}',
                                                @endforeach
                                            ];
                                            var __game_data = [
                                                @foreach($games as $id => $name)
                                                    {{\App\Game::where('game_id', $id)->where('time', '>=', \Carbon\Carbon::today()->timestamp)->where('user_id', $ids)->count()}},
                                                @endforeach
                                            ];
                                        </script>
                                    </h3>
                                </div>
                                <div class="kt-widget14__content">
                                    <div class="kt-widget14__chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <div class="kt-widget14__stat"></div>
                                        <canvas id="popularity" class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <div class="kt-widget14__legends">
                                        @foreach($games as $id => $name)
                                            <div class="kt-widget14__legend">
                                                <span class="kt-widget14__bullet" style="background: {{$name['color']}}"></span>
                                                <span class="kt-widget14__stats">{{$name['name']}}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
			            <div class="col-xl-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head kt-portlet__head--right kt-portlet__head--noborder  kt-ribbon kt-ribbon--clip kt-ribbon--left kt-ribbon--danger">
                        <div class="kt-ribbon__target" style="top: 12px;">
                            <span class="kt-ribbon__inner"></span>Maintenance
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit-top">
                        <div class="kt-space-5"></div>
                        Disabling the site during the update, avoiding conflicts or if something goes wrong.
                        <div class="kt-space-15"></div>
                        <div class="kt-section">
                            <div class="kt-section__content kt-section__content--border kt-section__content--fit">
                                <ul class="kt-nav" id="maintenance">
                                    @php
                                        $maintenanceActive = $settings['techworks'] == 1;
                                    @endphp
                                    <li id="m_normal" class="kt-nav__item @if(!$maintenanceActive) kt-nav__item--active @endif">
                                        <a href="javascript:void(0)" class="kt-nav__link"
                                            onclick="send('#maintenance', '/admin/setting/techworks/0', function() { $('#m_normal').addClass('kt-nav__item--active'); $('#m_m').removeClass('kt-nav__item--active'); })">
                                            <i class="kt-nav__link-icon flaticon2-layers-1"></i>
                                            <span class="kt-nav__link-text">The site is operating normally</span>
                                        </a>
                                    </li>
                                    <li id="m_m" class="kt-nav__item @if($maintenanceActive) kt-nav__item--active @endif">
                                        <a href="javascript:void(0)" class="kt-nav__link"
                                            onclick="send('#maintenance', '/admin/setting/techworks/1', function() { $('#m_m').addClass('kt-nav__item--active'); $('#m_normal').removeClass('kt-nav__item--active'); })">
                                            <i class="kt-nav__link-icon flaticon2-list-3"></i>
                                            <span class="kt-nav__link-text">Site maintenance</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<script src="/admin_assets/js/pages/dashboard.js" type="text/javascript"></script>
<script src="{{ asset('/admin_assets/js/pages/game_s.js') }}" type="text/javascript"></script>
