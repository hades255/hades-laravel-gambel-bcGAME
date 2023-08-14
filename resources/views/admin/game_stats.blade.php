<div id="__ajax_title" style="display: none">Statistics - Games</div>
<script src="{{ asset('/admin_assets/js/pages/game_s.js') }}" type="text/javascript"></script>

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
						$ids = (\App\User::where('chat_role', '<=', 4)->get()->pluck('id'));
@endphp
<script>var loadScript = null</script>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @if(Auth::user()->chat_role < 3)
        Вам недоступна эта информация
    @else
        <div class="kt-portlet">
            <div class="kt-portlet__body  kt-portlet__body--fit">
                <div class="row row-no-padding row-col-separator-xl">
                    <div class="col-xl-6">
                        <div class="kt-portlet kt-portlet--height-fluid">
                            <div class="kt-widget14">
                                <div class="kt-widget14__header kt-margin-b-30">
                                    <h3 class="kt-widget14__title">
                                        Number of games today
                                    </h3>
                                </div>
                                <div class="kt-widget14__chart" style="height:330px;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <canvas id="daily_games" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="kt-portlet kt-portlet--height-fluid " id="-1">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                All games
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="javascript:void(0)" id="s-common" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                                @php($c = "$('#s-common').html($(this).html())")
                                Today
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item" onclick="swapGameData('game-common', -1, 'today'); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Today</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-common', -1, 7); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">A week</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-common', -1, 31); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Month</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-common', -1, 31 * 3); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">3 months</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-common', -1, 31 * 6); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">6 months</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-common', -1, 31 * 12); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">1 year</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
                        <div class="kt-widget4 kt-widget4--sticky">
                            <div class="kt-widget4__items kt-portlet__space-x kt-margin-t-15">
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="fad fa-galaxy kt-font-danger"></i>
                                    </span>
                                    <a href="javascript:void(0)" class="kt-widget4__title">
                                        Games for this period:
                                    </a>
                                    <span class="kt-widget4__number kt-font-danger" id="game-common-count"></span>
                                </div>
                            </div>
                            <div class="kt-widget4__chart kt-margin-t-50"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="game-common" style="height: 150px; display: block; width: 516px;" width="516" height="150" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($games as $id => $game)
            <div class="col-xl-4">
                <div class="kt-portlet kt-portlet--height-fluid ">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{$game['name']}}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <a href="javascript:void(0)" id="s-{{$game['name']}}" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                                @php($c = "$('#s-".$game['name']."').html($(this).html())")
                                Today
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item" onclick="swapGameData('game-{{$game['name']}}', {{ $id }}, 'today'); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Today</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-{{$game['name']}}', {{ $id }}, 7); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">A week</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-{{$game['name']}}', {{ $id }}, 31); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">Month</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-{{$game['name']}}', {{ $id }}, 31 * 3); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">3 Month</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-{{$game['name']}}', {{ $id }}, 31 * 6); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">6 Month</span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item" onclick="swapGameData('game-{{$game['name']}}', {{ $id }}, 31 * 12); {!! $c !!}">
                                        <a href="javascript:void(0)" class="kt-nav__link">
                                            <span class="kt-nav__link-text">1 year</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit" id="{{ $id }}">
                        <div class="kt-widget4 kt-widget4--sticky">
                            <div class="kt-widget4__items kt-portlet__space-x kt-margin-t-15">
                                <div class="kt-widget4__item">
                                    <span class="kt-widget4__icon">
                                        <i class="{{ \App\Http\Controllers\GeneralController::getGameIcon($id) }} kt-font-danger"></i>
                                    </span>
                                    <a href="javascript:void(0)" class="kt-widget4__title">
                                        Games for this period:
                                    </a>
                                    <span class="kt-widget4__number kt-font-danger" id="game-{{$game['name']}}-count"></span>
                                </div>
                            </div>
                            <div class="kt-widget4__chart kt-margin-t-50"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                <canvas id="game-{{$game['name']}}" style="height: 150px; display: block; width: 516px;" width="516" height="150" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                loadScript += "loadGameData('game-{$game['name']}', '{$game['color']}'); swapGameData('game-{$game['name']}', {$id}, 'today');";
            </script>
        @endforeach
        </div>
    @endif
</div>

<script type="text/javascript">
if (window.location.href.indexOf('load')==-1) {
     window.location.replace(window.location.href+'?load');
} else {
    $(document).ready(function() {
		
        loadGameData('game-common', '#AC62FF');
        swapGameData('game-common', -1, 'today');
		
		loadGameData('game-Dice', '#5d78ff');
        swapGameData('game-Dice', 1, 'today');
		
		loadGameData('game-Wheel', '#5867dd');
        swapGameData('game-Wheel', 2, 'today');
		
		loadGameData('game-Crash', '#34bfa3');
        swapGameData('game-Crash', 3, 'today');
		
		loadGameData('game-Coinflip', '#36a3f7');
        swapGameData('game-Coinflip', 4, 'today');
		
		loadGameData('game-Mines', '#ffb822');
        swapGameData('game-Mines', 5, 'today');
		
		loadGameData('game-HiLo', '#c5cbe3');
        swapGameData('game-HiLo', 7, 'today');
		
		loadGameData('game-Blackjack', '#e74c3c');
        swapGameData('game-Blackjack', 8, 'today');
		
		loadGameData('game-Tower', '#8e44ad');
        swapGameData('game-Tower', 9, 'today');
		
		loadGameData('game-Roulette', '#aa88ff');
        swapGameData('game-Roulette', 10, 'today');
		
		loadGameData('game-Stairs', '#88aaff');
        swapGameData('game-Stairs', 11, 'today');
		
		loadGameData('game-Кейсы', '#ee88ff');
        swapGameData('game-Кейсы', 12, 'today');
		
		loadGameData('game-Keno', '#daa421');
        swapGameData('game-Keno', 14, 'today');
		
		loadGameData('game-Plinko', '#32d0d0');
        swapGameData('game-Plinko', 13, 'today');
		
        eval(loadScript)
}); }
</script>

