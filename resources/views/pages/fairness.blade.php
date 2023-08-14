@if(Auth::guest())
    <script type="text/javascript">load('/')</script>
@else
<div class="game__wrapper bonus_wrapper">
    <div class="bonus_header">
        <p>Fair game <i class="fas fa-info-circle fn_btn_info" onclick="info('provably_fair')"></i></p>
        <span>Checking the fair play system</span>
    </div>
    <div class="fn_container">
        <div class="fn_form">
            <div class="fn_form_block">
                <p>The game</p>
                <div class="fn_games">
                    <div class="fn_games_container">
                        <div class="fn_game fn_game_selected tooltip" title="Dice" data-game="dice">
                            <i class="fa fa-dice"></i>
                        </div>
						 <div class="fn_game tooltip" title="Wheel" data-game="wheel">
                            <i class="fad fa-circle-notch"></i>
                        </div>
                        <div class="fn_game tooltip" data-game="crash" title="Crash">
                            <i class="icon-crash"></i>
                        </div>
                        <div class="fn_game tooltip" title="Roulette" data-game="roulette">
                            <i class="icon-roulette"></i>
                        </div>
						<div class="fn_game tooltip" title="Keno" data-game="keno">
                            <i class="icon-keno"></i>
                        </div>
						<div class="fn_game tooltip" title="Mines" data-game="mines">
                            <i class="fas fa-bomb"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fn_form_block">
                <p>Client hash</p>
                <input value="{{\App\User::where('id', Auth::user()->id)->first()->client_seed}}" disabled id="_client" placeholder="Hash">
                <a class="ll cs_change" onclick="client_seed_change_prompt()">Change</a>
            </div>
            <div class="fn_form_block">
                <p>Server hash</p>
                <input placeholder="Server hash" oninput="hash()" value="example" id="_server">
            </div>
        </div>
        <div class="fn_info">
            <div class="fn_block">
                <p>RESULT</p>
                <div class="fn_sub">HASH:</div>
                <div id="hash"></div>
                <div class="fn_sub" id="number_sub">NUMBER:</div>
                <div id="number"></div>
            </div>
            <div class="fn_block" id="f_sub">
                <p>FORMULA</p>
                <div id="f"></div>
            </div>
			<div class="fn_block" id="r_sub">
                <p>RESULT</p>
                <div id="res"></div>
            </div>
        </div>
    </div>
</div>
@endif
