<div class="game__wrapper">
    <div class="col-md-3 col-sm-12 g_sidebar" data-parent="#w_container">
        <div class="row g_follow">
            <div class="row m0">
                <div class="g_md_n col-md-12">
                    <i class="fas fa-coin"></i>
                    <span>Coinflip</span>
                </div>
                <div class="col-xs-12">
                    <div class="b_label">
                        Bet Amount(USD)
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
            </div>
            <div class="col-xs-12 coin-select">
                <div class="col-xs-6 coin" style="display: none" onclick="flip('red')">
                    <div class="cf cf_red"></div><br>
                    <span>Red</span>
                </div>
                <div class="col-xs-6 coin" style="display: none" onclick="flip('black')">
                    <div class="cf cf_black"></div><br>
                    <span>Black</span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 mt10">
                <div class="g_s g_btn" onclick="coinflip()" id="play"><span id="bet_btn">Play</span></div>
            </div>
			@include('pages.game_task', ['game_id' => 4])
        </div>
        <div class="g_sidebar_footer">
            <div class="g_sidebar_footer_button" onclick="info('coinflip')">
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
                <div class="fad fa-volume-up tooltip" id="game_audio_on" style="display:none" title="Mute"></div>
				<div class="fad fa-volume-slash tooltip" id="game_audio_off" style="display:none" title="Unmute"></div>
            </div>
        </div>
    </div>
    <div id="w_container" class="g_c g_container crash col-md-9 col-sm-12 coin_container">
        <div class="cf_status" style="display: none">
            <h1 class="ribbon-wide">
                <strong class="ribbon-wide-content" id="cf_status_text"></strong>
            </h1>
        </div>
        <div class="cf_info">
            <div class="cf_s">
                <span id="games">0</span>
                <p>Series</p>
            </div>
			<style>
			.side-icon-a {
    position: relative;
    font-size: 50px;
    /* left: 10px; */
    padding-left: 31px;
    padding-top: 18px;
}
.side-icon-b {
    position: relative;
    font-size: 50px;
    /* left: 10px; */
    padding-left: 25px;
    padding-top: 20px;
}
			</style>
            <div id="coin">
                <div class="side-a"><div class="side-icon-a"><i class="fad fa-egg"></i></div></div>
                <div class="side-b"><div class="side-icon-b"><i class="fal fa-dove"></i></div></div>
            </div>
            <div class="cf_s cf_s_c">
                <span>x</span><span id="mul">0</span><span>.</span><span id="mul_m">0</span>
                <p>Coefficient.</p>
            </div>
        </div>
        <div class="cf_history"></div>
    </div>
</div>
