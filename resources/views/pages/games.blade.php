 <div class="col-xs-12 index-carousel">
 	@if($settings->slider == 1)
 
		
    <div class="carousel">
        <div>
            <div class="carousel-slide">
                
                <div class="carousel-background" style="background-image: url(/img/game/rocketwall2.jpg);"></div>
                <div class="carousel-content">
                    <div class="slide-header">
                        BLAZING ROCKET
                    </div>
                    <div class="slide-content">
                        No1 crash game with the biggest jackpot<br>
                        Instant payout winnings
                    </div>
                </div>
               
            </div>
        </div>
        <div>
            <div class="carousel-slide">
                <div class="carousel-background" style="background-image: url(/img/game/fortue.jpg);"></div>
                <div class="carousel-content">
                    <div class="slide-header">
                       MINES
                    </div>
                    <div class="slide-content">
                        Thrilling mines game</br>
                        Biggest jackpots awaits you!
                    </div>
                </div>
               
            </div>
        </div>
        <div>
            <div class="carousel-slide">
                <div class="carousel-background" style="background-image: url(/img/game/dices.jpg);"></div>
                <div class="carousel-content">
                    <div class="slide-header">
                        ROLL THE DICES
                    </div>
                    <div class="slide-content">
                        Are you feelin lucky?<br>Roll the dice and keep your fingers crossed
                    </div>
                </div>
               
            </div>
        </div>
    </div> 
	@endif
	
</div>
<div class="col-xs-12" style="margin-top: 10px">
        @php
        $link = function($game) {
            if(!\App\Game::isDisabled($game)) echo "load('/".$game."')";
            else echo "";
        };
    @endphp
	@php
        $overlay = function($game) {
            if(!\App\Game::isDisabled($game)) echo '<div class="i_game_overlay-'.$game.'"></div>';
            else echo '	        <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>';
        };
    @endphp
	    @php
        $online = function($game) {
			$settings = \App\Settings::where('id', 1)->first();
					$fakeonline_games = $settings->fakeonline_games * 1;
            if(!\App\Game::isDisabled($game)) echo '<div class="i_game-stat tooltip" title="in the game"><i class="fas i_icon-stat fa-user"></i> '.mt_rand(5, 1 * $fakeonline_games).'</div>';
            else echo '';
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
	<div class="landing_Caption"><span>Games</span></div>
  <!---  <div class="col-xs-12">
        <div class="i_game i_game-bottle event_container" style="background-image: url(/)" onclick="load('/battle')">
            <div class="i_game-name">
                <span><i class="fas fa-club"></i> Battle</span>
                <p>Test</p>
            </div>
        </div>
    </div> --->
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-mines" onclick="{{$link('mines')}}" style="background-image: url('/img/game/mines.jpg')">
            
            <div class="i_game-name">
                <i class="far fa-bomb"></i>
                Mines
            </div>
			{{$online('mines')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-crash" onclick="{{$link('crash')}}" style="background-image: url('/img/game/crash.jpg')">
		
            <div class="i_game-name">
                <i class="icon-crash"></i>
                Crash
            </div>
			{{$online('crash')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-dice" onclick="{{$link('dice')}}" style="background-image: url('/img/game/dice.jpg')">
           
            <div class="i_game-name">
                <i class="fa fa-dice"></i>
                Dice
            </div>
			{{$online('dice')}}
        </div>
    </div>
        <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-wheel" onclick="{{$link('wheel')}}" style="background-image: url('/img/game/wheel.jpg')">
            {{$overlay('wheel')}}
            <div class="i_game-name">
                <i class="fad fa-circle-notch"></i>
                Wheel
            </div>
			{{$online('wheel')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-coinflip" onclick="{{$link('coinflip')}}" style="background-image: url('/img/game/coinflip.gif'); background-position-y: top; background-size: cover;">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="far fa-coin"></i>
                Coinflip
            </div>
			{{$online('coinflip')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-hilo" onclick="{{$link('hilo')}}" style="background-image: url('/img/game/hilo.png')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="icon-hilo"></i>
                HiLo
            </div>
			{{$online('hilo')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-blackjack" onclick="{{$link('blackjack')}}" style="background-image: url('/img/game/blackjack.jpg')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="icon-blackjack"></i>
                Blackjack
            </div>
			{{$online('blackjack')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-tower" onclick="{{$link('tower')}}" style="background-image: url('/img/game/tower.jpg')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="fad fa-chess-rook"></i>
                Tower
            </div>
			{{$online('tower')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-roulette" onclick="{{$link('roulette')}}" style="background-image: url('/img/game/roulette.jpg')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="icon-roulette"></i>
                Roulette
            </div>
			{{$online('roulette')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-stairs" onclick="{{$link('stairs')}}" style="background-image: url('/img/game/stairs.jpg')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="icon-stairs"></i>
                Stairs
            </div>
			{{$online('stairs')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-keno" onclick="{{$link('keno')}}" style="background-image: url('/img/game/keno.jpg')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="icon-keno"></i>
                Keno
            </div>
			{{$online('keno')}}
        </div>
    </div>
	<div class="col-xs-13 col-sm-6 col-md-4">
        <div class="i_game i_game-plinko" onclick="{{$link('plinko')}}" style="background-image: url('/img/game/plinko.jpg')">
            <div class="i_game-ribbon_container">
            <span class="i_game-ribbon">
                Under Maintenance soon !
            </span>
        </div>
            <div class="i_game-name">
                <i class="fas fa-ball-pile"></i>
                Plinko
            </div>
			{{$online('plinko')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-4" id="cases">
        <div class="i_game i_game-cases" onclick="{{$link('cases')}}">
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
				@if(\App\Box::isFreeAvailable())
                <div class="gg_sidebar-notification">1</div>
				@endif
                Cases
            </div>
			{{$online('cases')}}
        </div>
    </div>
    <div class="col-xs-13 col-sm-6 col-md-5">
        <div class="i_game i_game-bonus" @if(!Auth::guest()) onclick="load('/bonus')" @else onclick="$('#b_si').click()" @endif>
            <div class="i_game_overlay-bonus i_game_overlay-bonus_1"></div>
            <div class="i_game_overlay-bonus i_game_overlay-bonus_2"></div>
            <div class="i_game_overlay-bonus i_game_overlay-bonus_3 hidden-xs"></div>
            <div class="i_game-name bonus_banner_desc" id="bonus_banner_name">
                <i class="fad fa-coins i_y_i" style="margin-right: 5px"></i><span class="i_y_i">Bonus</span><br>
                Get cash bonus<br>join and play now!
            </div>
        </div>
    </div>
    
</div>