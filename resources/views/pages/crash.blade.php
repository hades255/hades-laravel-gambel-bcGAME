<div class="game__wrapper">
    <div class="col-md-3 col-sm-12 g_sidebar" data-parent="#w_container">
        <div class="row g_follow">
            <div class="row m0">
                <div class="g_md_n col-md-12">
                    <i class="icon-crash"></i>
                    <span>Crash</span>
                </div>
                <div class="col-xs-12">
                    <div class="b_label">
                        Bet Amount (USD)
                    </div>
                </div>
                <div class="col-xs-12 mt10">
                    <script>var __profit = function() { }; </script>
                    <input id="bet" data-number-input="true"  value="<?= Auth::guest() ? '100.00' : '0.15' ?>" type="text" class="b_input">
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
				<br>
				<div class="col-xs-12">
                    <div class="b_label" id="autoOut-text">
                        Auto output
                    </div>
                </div>
				<div class="col-xs-12">
                    <input id="betout" data-number-input="true" value="1.50" type="text" class="b_input">
					                    <div class="b_input_btnsx b_input_btn koeff" id="x"><i class="fas fa-times"></i></div>
					<div class="b_input_bottom" style="display: inline-block">
                        <div id="12" class="col-xs-3 g_s">1.20</div>
                        <div id="15" class="col-xs-3 g_s">1.50</div>
                        <div id="20" class="col-xs-3 g_s">2.00</div>
                        <div id="50" class="col-xs-3 g_s">5.00</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 mt5">
                <div class="g_s g_btn" onclick="crash()" id="play"><span id="bet_btn">Play</span></div>
            </div>
			@include('pages.game_task', ['game_id' => 3])
        </div>
        <div class="g_sidebar_footer">
            <div class="g_sidebar_footer_button" onclick="info('crash')">
                <i class="fas fa-info-circle tooltip" title="Game Information"></i>
            </div>
            <div class="g_sidebar_footer_button" onclick="provablyfair()">
                <i class="fad fa-shield-alt tooltip" title="Fair game"></i>
            </div>
						            <div class="g_sidebar_footer_button" onclick="setAudioGame(!isAudioGame)">
						<script>$(document).ready(function(){isAudioGame?($("#game_audio_on").fadeIn(0),$("#game_audio_off").fadeOut(0)):($("#game_audio_off").fadeIn(0),$("#game_audio_on").fadeOut(0))});</script>
                <div class="fad fa-volume-up tooltip" id="game_audio_on" style="display:none" title="Mute"></div>
				<div class="fad fa-volume-slash tooltip" id="game_audio_off" style="display:none" title="Unmute"></div>
            </div>
        </div>
    </div>
    <div id="w_container" class="g_c g_container crash col-md-9 col-sm-12">
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
.c_f.c_f-progress-demo {
    border-color: #ffc645;
    color: #ffc645;
}
.c_f.c_f-win-demo {
    border-color: #ffc645;
    color: #61cf6c;
}
.c_f.c_f-lost-demo {
    border-color: #ffc645;
    color: #e86376;
}
		</style>
        <div class="c_f" style="display:none">
		<div class="tip_badge"><div class="tip_text" style="display:none">DEMO MODE</div></div>
            <p class="c_h" id="game_multiplier">x0.00</p>
            <p class="c_p" id="game_profit">+0.00 &nbsp;<i class="fad fa-coins"></i></p>
        </div>
        <canvas id="chart"></canvas>
    </div>
</div>
