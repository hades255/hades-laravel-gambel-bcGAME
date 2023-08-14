<div class="game__wrapper">
    <div class="col-md-3 col-sm-12 9 g_sidebar" data-parent="#d_container">
        <div class="row g_follow">
            <div class="row m0">
                <div class="g_md_n col-md-12">
                    <i class="fa fa-dice"></i>
                    <span>Dice</span>
                </div>
				<div class="game-sidebar-tabs"><div class="game-sidebar-tab active" onclick="setMode('default')" data-tab="default">Manual</div><div class="game-sidebar-tab" onclick="setMode('auto')" data-tab="auto">Auto</div></div>
                <div class="col-xs-12 mb10">
                    <div class="b_label">
                        Bet Amount (USD)
                    </div>
                </div>
                <div class="col-xs-12">
                    <script>
                        var __profit = function(val) {
                            if(typeof window.cur !== 'string') {
                                setTimeout(function() {
                                    __profit(val);
                                }, 100);
                                return;
                            }
                            var v = val == null ? $('#slider-range').slider('value') : val;
                            var r = getDiceProfit($('#bet').val(), cur === 'lower' ? 0 : v, cur === 'higher' ? 100 : v);
                            if(!isNaN(r)) $('#bet_profit').html(r);

                            $('.bet_profit').toggleClass('bet_profit-error', parseFloat(r) <= 0);
                        };
                    </script>
                    <input id="bet" oninput="__profit()" value="<?= Auth::guest() ? '100.00' : '0.15' ?>" type="text" class="b_input" data-number-input="true">
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
                        Win: <span id="bet_profit"></span> &nbsp;<i class="fad fa-coins"></i>
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
            </div>
            <div class="col-xs-12 col-sm-12 mt10">
                <div class="g_s g_btn" id="play" onclick="dice()">Play</div>
            </div>
						<div class="col-xs-12 col-sm-12 mt5">
                <div class="g_s g_btn" onclick="diceauto()" id="auto" style="display: none;"><span id="bet_btn_auto">Run</span></div>
            </div>
			@include('pages.game_task', ['game_id' => 1])
        </div>
        <div class="g_sidebar_footer">
            <div class="g_sidebar_footer_button" onclick="info('dice')">
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
    <div id="d_container" class="col-md-9 col-sm-12 g_c g_container">
        <div class="d_icon hidden-sm hidden-xs">
            <i class="fa fa-dice"></i>
        </div>
        <div class="d_slider-border row mt15" style="padding: 11px 0;">
            <div class="col-xs-6">
                <div class="b_label" id="sw_text">Less</div>
                <input id="i_value" value="50" type="text" class="b_input_s mt5" data-number-input="true">
                <div class="b_input_btns">
                    <div onclick="sw()" class="b_input_btn g_s"><i class="fa fa-exchange-alt"></i></div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="b_label">Chance</div>
                <input disabled id="i_chance" value="50%" type="text" class="b_input_s mt5" data-number-input="true">
            </div>
        </div>
        <div class="d_slider">
		<style type="text/css">
		.ui-corner-all{background: #ff020299}
		.ui-button, .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, html .ui-button.ui-state-disabled:active, html .ui-button.ui-state-disabled:hover 
		{border: 1px solid #c5c5c5;background:#f6f6f6;font-weight:400;color:#454545}
		</style>
            <div class="d_slider-border">
                <div id="slider-range"></div>
            </div>
        </div>
    </div>
</div>
