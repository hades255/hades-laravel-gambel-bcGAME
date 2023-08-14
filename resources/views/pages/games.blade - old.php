 <div class="col-xs-12 index-carousel">
    <div class="carousel">
        <div>
            <div class="carousel-slide">
                <div class="carousel-background" style="background-image: url(/img/esport.jpg);"></div>
                <div class="carousel-content">
                    <div class="slide-header">
                        Promo codes
                    </div>
                    <div class="slide-content">
                        Do you want to be aware of the news? Get free bonuses? Promo codes, sweepstakes and more.<br>
                        Come to our group VK -<a class="ll" href="https://vk.com/uptouch" target="_blank">UpTouch</a>!
                    </div>
                </div>
                <button class="slide-button" onclick="window.open('https://vk.com/uptouch', '_blank')">Go</button>
            </div>
        </div>
        <div>
            <div class="carousel-slide">
                <div class="carousel-background" style="background-image: url(/img/casino.jpg);"></div>
                <div class="carousel-content">
                    <div class="slide-header">
                        Shine in simplicity
                    </div>
                    <div class="slide-content">
                        Experience the peak of social gambling,<br>combining the atmosphere of a real casino with the simplicity of your favorite games.
                    </div>
                </div>
                <button class="slide-button" @if(Auth::guest()) onclick="$('#b_si').click();" @else onclick="load('/bonus')" @endif>To start playing</button>
            </div>
        </div>
    </div> 
	@if(Auth::guest())
	<div class="welcome_Welcome__rQYTl">
            <div class="welcome_Right__27QGe">
            <a href="javascript:void(0)" @if(Auth::guest()) onclick="$('#b_si').click();" @else onclick="load('/user?id={{Auth::user()->id}}')" @endif>
            <img src="/img/Slide2.png" alt="" width="100%">
                   		</a>

                </div>
                <div class="welcome_Left__JPT6w">

                    <div class="welcome_Intro__3Zo-O">UpTouch - Instant games with money withdrawal. The best licensed site for vacation earnings.
                    </div>
                    <div class="welcome_Counters__2BjGU">
                        <div class="welcome_Item__3ifzJ">
                            <div class="welcome_Label__2pEjZ">Players</div>{{\DB::table('users')->count() + 15732}}</div>
                        <div class="welcome_Item__3ifzJ">
                            <div class="welcome_Label__2pEjZ">Bred</div>{{\DB::table('withdraw')->where('status', 1)->sum('amount') + $settings->fakesumwithdraw}}</div>
                    </div>
                     <div class="welcome_Counters__2BjGU">

                    </div>
                     <div class="welcome_Registration__3VnWT"> <span>BONUS ON REGISTRATION</span>
                    <a href="javascript:void(0)" @if(Auth::guest()) onclick="$('#b_si').click();" @else onclick="load('/')" @endif class="btn22">
                  			TO START PLAYING

                   		</a>
                    </div>
                </div>

            </div>
			@endif
</div>
<div class="col-xs-12" style="margin-top: 10px">
    @php
        $overlay = function($game) {
            if(Auth::guest() || !\App\Game::isDisabled($game)) echo '<div class="i_game_overlay-'.$game.'"></div>';
            else echo '<div data-disable-ajax-loading="'.$game.'" class="i_game_disabled_overlay" onclick="$(\'.md-unavailable\').toggleClass(\'md-show\', true)"></div>';
        };
    @endphp
    @if($settings->warn_enabled == 1)
        <div class="col-xs-12">
            <div class="notification">
                <i class="fad fa-exclamation-triangle"></i>
                <div class="notification-content">
                    <div>{{$settings->warn_title}}</div>
                    <div>{{$settings->warn_text}}</div>
                </div>
            </div>
        </div>
    @endif
	
		@if(!Auth::guest())
	@if($settings->slide_enabled == 1)
        <div class="col-xs-12">
            <div class="notification2">
                <i class="fad fa-coins"></i>
                <div class="notification-content">
                    <div>{{$settings->slide_title}}</div>
                    <div>{{$settings->slide_text}}</div>
                </div>
            </div>
        </div>
    @endif
	@endif
	<style type="text/css">
   .landing_Caption {
    display: flex;
    justify-content: center;
    padding: 0 30px 25px;
    font-size: 16px;
    text-transform: uppercase;
    color: #fff;
    position: relative;
    overflow: hidden;
	top: 11px;
}
   .landing_Caption>span {
    position: relative;
    z-index: 1;
    background-color: #20242d;
    padding: 0 15px;
    display: inline-block;
}
  </style>
	<div class="landing_Caption"><span>Our games</span></div>
  <!---  <div class="col-xs-12">
        <div class="i_game i_game-bottle event_container" style="background-image: url(/img/game/svg/plinko.svg)" onclick="load('/battle')">
            <div class="i_game-name">
                <span><i class="fas fa-club"></i> Battle</span>
                <p>Test</p>
            </div>
        </div>
    </div> --->
    @php
	$mines = rand(5, 81);
	$crash = rand(5, 41);
	$wheel = rand(5, 51);
	$dice = rand(5, 31);
	$coinflip = rand(5, 31);
	$hilo = rand(5, 31);
	$blackjack = rand(5, 31);
	$tower = rand(5, 41);
	$roulette = rand(5, 21);
	$stairs = rand(5, 61);
	$keno = rand(5, 36);
	$plinko = rand(5, 41);
	$cases = rand(5, 21);
	@endphp
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-mines" onclick="load('/mines')" style="background-image: url('/img/game/svg/mines.svg')">
            {{$overlay('mines')}}
            <div class="i_game-name">
                <i class="far fa-bomb"></i>
                Mines
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$mines}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-crash" onclick="load('/crash')" style="background-image: url('/img/game/svg/crash.svg')">
            <div class="i_game-name">
                <i class="icon-crash"></i>
                Crash
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$crash}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-wheel" onclick="load('/wheel')" style="background-image: url('/img/game/svg/wheel.svg')">
            {{$overlay('wheel')}}
            <div class="i_game-name">
                <i class="fad fa-circle-notch"></i>
                Wheel
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$wheel}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-dice" onclick="load('/dice')" style="background-image: url('/img/game/svg/dice.svg')">
            {{$overlay('dice')}}
            <div class="i_game-name">
                <i class="fa fa-dice"></i>
                Dice
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$dice}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-coinflip" onclick="load('/coinflip')" style="background-image: url('/img/game/svg/coinflip.svg'); background-position-y: top; background-size: cover;">
            {{$overlay('coinflip')}}
            <div class="i_game-name">
                <i class="far fa-coin"></i>
                Coinflip
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$coinflip}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-hilo" onclick="load('/hilo')" style="background-image: url('/img/game/svg/hilo.svg')">
            {{$overlay('hilo')}}
            <div class="i_game-name">
                <i class="icon-hilo"></i>
                HiLo
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$hilo}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-blackjack" onclick="load('/blackjack')" style="background-image: url('/img/game/svg/blackjack2.svg')">
            {{$overlay('blackjack')}}
            <div class="i_game-name">
                <i class="icon-blackjack"></i>
                Blackjack
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$blackjack}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-tower" onclick="load('/tower')" style="background-image: url('/img/game/svg/tower.svg')">
            {{$overlay('tower')}}
            <div class="i_game-name">
                <i class="fad fa-chess-rook"></i>
                Tower
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$tower}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-roulette" onclick="load('/roulette')" style="background-image: url('/img/game/svg/roulette.svg')">
            {{$overlay('roulette')}}
            <div class="i_game-name">
                <i class="icon-roulette"></i>
                Roulette
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$roulette}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-stairs" onclick="load('/stairs')" style="background-image: url('/img/game/svg/stairs.svg')">
            {{$overlay('stairs')}}
            <div class="i_game-name">
                <i class="icon-stairs"></i>
                Stairs
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$stairs}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-keno" onclick="load('/keno')" style="background-image: url('/img/game/svg/keno.svg')">
            {{$overlay('keno')}}
            <div class="i_game-name">
                <i class="icon-keno"></i>
                Keno
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$keno}}
            </div>
        </div>
    </div>
	<div class="col-xs-12 col-sm-6 col-md-4">
        <div class="i_game i_game-plinko" onclick="load('/plinko')" style="background-image: url('/img/game/svg/plinko.svg')">
            {{$overlay('plinko')}}
            <div class="i_game-name">
                <i class="fas fa-ball-pile"></i>
                Plinko
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$plinko}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-4" id="cases">
        <div class="i_game i_game-cases" onclick="load('/cases')">
            {{$overlay('cases')}}
            <div class="i_game-cases-float">
                <div class="floating">
                    <i class="fad fa-box-open"></i>
                </div>
                <div class="floating">
                    <i class="fad fa-box-open"></i>
                </div>
            </div>
            <div class="i_game-name">
                <i class="fad fa-box-open"></i>
                <div class="gg_sidebar-notification">1</div>
                Кейсы
            </div>
			<div class="i_game-stat tooltip" title="Онлайн в игре">
                <i class="fas i_icon-stat fa-user"></i>
                {{$cases}}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-5">
        <div class="i_game i_game-bonus" @if(!Auth::guest()) onclick="load('/bonus')" @else onclick="$('#b_si').click()" @endif>
            <div class="i_game_overlay-bonus i_game_overlay-bonus_1"></div>
            <div class="i_game_overlay-bonus i_game_overlay-bonus_2"></div>
            <div class="i_game_overlay-bonus i_game_overlay-bonus_3 hidden-xs"></div>
            <div class="i_game-name bonus_banner_desc" id="bonus_banner_name">
                <i class="fad fa-coins i_y_i" style="margin-right: 5px"></i><span class="i_y_i">Bonus</span><br>
                Get cash bonus<br>free to start playing on UpTouch!
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="i_game i_game-vk" onclick="var win = window.open('https://vk.com/uptouch', '_blank'); win.focus()" id="vk_banner">
            <i class="fab fa-vk i_game_overlay-vk"></i>
            <div class="i_game-name vk_banner_desc" id="vk_banner_name">
                <i class="fab fa-vk i_b_i"></i><span class="i_b_i">VKontakte</span><br>
                Join the VKontakte group<br>
                and stay up to date with all the news<br>
                as well as special promo codes!
            </div>
        </div>
    </div>
</div>