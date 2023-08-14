<div class="game__wrapper">
    <div class="col-md-3 col-sm-12 g_sidebar" data-parent="#w_container">
        <div class="row g_follow">
            <div class="row m0">
                <div class="g_md_n col-md-12">
                    <i class="fad fa-chess-rook"></i>
                    <span>Tower</span>
                </div>
                <div class="col-xs-12">
                    <div class="b_label">
                        Bet Amount (USD)
                    </div>
                </div>
                <div class="col-xs-12 mt10">
                    <script>var __profit = function() { }; </script>
                    <input id="bet" data-number-input="true" value="<?= Auth::guest() ? '100.00' : '0.15' ?>" type="text" class="b_input">
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
            <div class="col-xs-12">
                <div class="b_label">
                    Number of mines
                </div>
            </div>
            <div class="col-xs-12 mb10 mt5">
                <div class="bombs_container tower_container">
                    <div data-bomb="1" class="bc_active">1</div>
                    <div data-bomb="2">2</div>
                    <div data-bomb="3">3</div>
                    <div data-bomb="4">4</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <div class="g_s g_btn" onclick="tower()" id="play"><span id="bet_btn">Play</span></div>
            </div>
			@include('pages.game_task', ['game_id' => 9])
        </div>
        <div class="g_sidebar_footer">
            <div class="g_sidebar_footer_button" onclick="info('tower')">
                <i class="fas fa-info-circle tooltip" title="Game Information"></i>
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
    <div id="w_container" class="g_c g_container crash col-md-9 col-sm-12">
		<style>
* {
margin:0;
padding:0;
outline:0;
text-decoration:none;
list-style-type:none;
-webkit-box-sizing:border-box;
box-sizing:border-box;
}
@media(min-width: 992px){
    ::-webkit-scrollbar {
        -webkit-appearance:none;
        width:6px;
        background-color:#242323;
    }

    ::-webkit-scrollbar-thumb {
        border-radius:4px;
        background-color:#636363;
    }
}


::-webkit-input-placeholder {
color:#818181;
font-size:16px;
font-weight:400;
}

::-moz-placeholder {
color:#818181;
font-size:16px;
font-weight:400;
}

:-ms-input-placeholder {
color:#818181;
font-size:16px;
font-weight:400;
}

:-moz-placeholder {
color:#818181;
font-size:16px;
font-weight:400;
}
.outcome-window{
    position: absolute;
    z-index: 50;
    background: rgba(36, 35, 35, 0.92);
    padding: 20px 40px;
    border-radius: 10px;
    border: 2px solid #44d13a;
    display: none;
	-moz-user-select: none;
-khtml-user-select: none;
user-select: none;     
}
.outcome-window_centered {
    top: 49.6%;
    left: 56%;
    transform: translateX(-50%) translateY(-50%);
}
@media (max-width: 766px) {
.outcome-window_centered {
    top: 45%;
    left: 54%;
    transform: translateX(-50%) translateY(-50%) scale(0.7);
}
}

.outcome-window_won{
    /* border: 2px solid #ffc200; */
}
.outcome-window__coeff{
    font-size: 36px;
    font-weight: 800;
    text-align: center;

}
.outcome-window_won__coeff{
    color: #44d13a;
}
.outcome-window__text{
    color: #b4b4b4;
    margin-top: 3px;
    font-size: 13px;
    text-align: center;
    white-space: nowrap;
}
.outcome-window_won-wrapper{
    color: #44d13a;
    font-size: 15px;
    font-weight: 500;
}

.outcome-window-demo{
    position: absolute;
    z-index: 50;
    background: rgba(36, 35, 35, 0.92);
    padding: 20px 40px;
    border-radius: 10px;
    border: 2px solid #ffc200;
    display: none;
	-moz-user-select: none;
-khtml-user-select: none;
user-select: none;     
}
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

.outcome-window_won-demo{
    /* border: 2px solid #ffc200; */
}
.outcome-window__coeff-demo{
    font-size: 36px;
    font-weight: 800;
    text-align: center;

}
.outcome-window_won__coeff-demo {
    color: #ffc200;
}
.outcome-window_won-wrapper-demo {
    color: #ffc200;
    font-size: 15px;
    font-weight: 500;
}
	</style>
		<div class="outcome-window outcome-window_won outcome-window_centered">
                                                <div class="outcome-window__coeff outcome-window_won__coeff">x1.05</div>
                                                <div class="outcome-window__text outcome-window_won__text">you won
                                                        <span class="outcome-window_won-wrapper"><span class="outcome-window_won__sum">1050</span>
                                                                <span class="myicon-coins"></span></span></div>
                                        </div>
																				<div class="outcome-window-demo outcome-window_won-demo outcome-window_centered">
            <div class="tip_badge"><div class="tip_text">DEMO MODE</div></div>                                    <div class="outcome-window__coeff-demo outcome-window_won__coeff-demo">x1.07</div>
                                                <div class="outcome-window__text outcome-window_won__text">you won
                                                        <span class="outcome-window_won-wrapper-demo"><span class="outcome-window_won__sum">107.00</span>
                                                                <span class="myicon-coins"></span></span></div>
                                        </div>
        <div class="tower_multipliers_bg"></div>
        <div class="tower">
            <div class="tower_multipliers">
                @for($i = 0; $i < 10; $i++)
                    <div data-row-id="{{$i}}"></div>
                @endfor
            </div>
        </div>
        <div class="tower">
            <div class="tower_grid tower">
                @php
                    $same = array();
                    for($i = 0; $i < 10; $i++) $same[$i] = array();
                @endphp
                @for($i = 0; $i < 5 * 10; $i++)
                    @php(array_push($same[$i % 10], 1))
                    <div data-r="{{$i % 10}}" data-grid-in-row-id="{{sizeof($same[$i % 10]) - 1}}" data-grid-id="{{$i}}" class="mine_disabled tower_select"><div></div></div>
                @endfor
            </div>
        </div>
    </div>
</div>
