<div class="game__wrapper">
    <div class="col-md-3 col-sm-12 g_sidebar" data-parent="#w_container">
        <div class="row g_follow">
            <div class="row m0">
                <div class="g_md_n col-md-12">
                    <i class="fad fa-circle-notch"></i>
                    <span>Wheel</span>
                </div>
				<div class="game-sidebar-tabs"><div class="game-sidebar-tab active" onclick="setMode('default')" data-tab="default">Manual</div><div class="game-sidebar-tab" onclick="setMode('auto')" data-tab="auto">Auto</div></div>
                <div class="col-xs-12">
                    <div class="b_label">
                        Stake amount
                    </div>
                </div>
                <div class="col-xs-12 mt10">
                    <script>
                        var __profit = function() {
                            var r = typeof selected_color !== 'string' ? $('#bet').val() * 2 : (selected_color === 'green' ? $('#bet').val() * 14 : $('#bet').val() * 2);
                            if(!isNaN(r)) $('#bet_profit').html((r).toFixed(2));
                        };
                    </script>
                    <input id="bet" value="<?= Auth::guest() ? '100.00' : '0.15' ?>" type="text" class="b_input" data-number-input="true">
                    <div class="b_input_btns">
                        <div id="divide" class="b_input_btn g_s"><i class="fa fa-divide"></i></div>
                        <div id="multiply" class="b_input_btn g_s"><i class="fa fa-asterisk"></i></div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="b_input_bottom" style="display: inline-block">
                        <div id="01" class="col-xs-2 g_s">+0.1</div>
                        <div id="1" class="col-xs-2 g_s">+1</div>
                        <div id="5" class="col-xs-2 g_s">+5</div>
                        <div id="10" class="col-xs-2 g_s">+10</div>
						<div id="25" class="col-xs-2 g_s">+25</div>
						<div id="00" class="col-xs-2 g_s"><i class="fas fa-trash-alt"></i></div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="bet_profit">
                        win: <span id="bet_profit"></span> &nbsp;<i class="fad fa-coins"></i>
                        <div class="hidden-xs mt5">
                            Цвет: <span id="w_color" class="bet_profit-error">Not selected</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt5"></div>
            <div class="row m0">
                <div class="col-xs-4">
                    <div class="w_color_btn w_color_btn-red mt5" data-wheel-color="red" onclick="pickColor('red')">
                        x2
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="w_color_btn w_color_btn-green mt5" data-wheel-color="green" onclick="pickColor('green')">
                        x14
                    </div>
                </div>
                <div class="col-xs-4">
                    <div class="w_color_btn w_color_btn-black mt5" data-wheel-color="black" onclick="pickColor('black')">
                        x2
                    </div>
                </div>
            </div>
							<div class="col-xs-12 mt5" id="gamestext" style="display: none;">
                <div class="b_label">
                    Number of games
                </div>
            </div>
            <div class="col-xs-12 mb10 mt5"  id="gamesvalue" style="display: none;">
                <div class="bombs_container">
                    <div data-games="15" class="bc_active">15</div>
                    <div data-games="25">25</div>
                    <div data-games="50">50</div>
                    <div data-games="240"><i class="far fa-infinity"></i></div>
                    <div id="change_games">
                        <span>Change</span>
                        <input data-number-input="true" class="bomb_input dn" value="5" placeholder="5-240">
                    </div>
                </div>
            </div>
             <div class="col-xs-12" id="gamesvictory" style="display: none;">
                <div class="b_label">
                    Stop on win
                </div>
            </div>
			<div class="col-xs-12 mb10 mt5" id="gamesvictoryvalue" style="display: none;">
                <div class="buttons-3">
                    <div data-victory="0" class="buttons-3-selected">Yes</div>
                    <div data-victory="1" class="">No</div>
					<div data-victory="2" class="">x5</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 mt5">
                <div class="g_s g_btn" onclick="wheel()" id="play">Play</div>
            </div>
			<div class="col-xs-12 col-sm-12 mt5">
                <div class="g_s g_btn" onclick="wheelauto()" id="auto" style="display: none;"><span id="bet_btn_auto">Run</span></div>
            </div>
        </div>
        <div class="g_sidebar_footer">
            <div class="g_sidebar_footer_button" onclick="info('wheel')">
                <i class="fas fa-info-circle tooltip" title="Game Information"></i>
            </div>
            <div class="g_sidebar_footer_button" onclick="setQuickGame(!isQuick)">
			<script>$(document).ready(function(){$('#game_quick').toggleClass('demo_active', isQuick)});</script>
                <i class="fas fa-bolt tooltip" id="game_quick" title="Quick game"></i>
            </div>
            <div class="g_sidebar_footer_button" onclick="provablyfair()">
                <i class="fad fa-shield-alt tooltip" title="Fair game"></i>
            </div>
									            <div class="g_sidebar_footer_button" onclick="setAudioGame(!isAudioGame)">
						<script>$(document).ready(function(){isAudioGame?($("#game_audio_on").fadeIn(0),$("#game_audio_off").fadeOut(0)):($("#game_audio_off").fadeIn(0),$("#game_audio_on").fadeOut(0))});</script>
                <div class="fad fa-volume-up tooltip" id="game_audio_on" style="display:none" title="MUTE"></div>
				<div class="fad fa-volume-slash tooltip" id="game_audio_off" style="display:none" title="UNMUTE"></div>
            </div>
        </div>
    </div>
    <div id="w_container" class="g_c g_container col-md-9 col-sm-12">
		<style>
		.tip_badge {
    position: absolute;
    top: -3px;
    width: 100%;
    left: 0;
    text-align: center;
    z-index: 2;
}
.tip_text {
    background: #ffc645;
    display: inline-block;
    color: #2b313f;
    padding: 2px 8px;
    text-transform: uppercase;
    font-size: .7em;
    font-weight: 500;
    border-radius: 0 0 5px 5px;
}
.wg_win-demo {
    color: #3bc248;
    border: 1px solid #ffc645;
}
.wg_lose-demo {
    border: 1px solid #ffc645;
    color: #d75d71;
}
		</style>
        <div class="wheel_game_result" style="display: none">
		<div class="tip_badge"><div class="tip_text" style="display:none">DEMO MODE</div></div>
            <div class="mul"></div>
            <div class="te"></div>
        </div>
        <canvas id="canvas" class="w_wheel" width="880" height="600" data-responsiveMinWidth="180"></canvas>
        <div class="wr_i hidden-xs hidden-md hidden-sm"></div>
        <div class="wr_o hidden-xs hidden-md hidden-sm"></div>
        <img id="prizePointer" class="w_pointer" src="/img/pointer_white.png" alt="V" />
    </div>
</div>
