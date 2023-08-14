<div class="game__wrapper">
    <div class="col-md-3 col-sm-12 g_sidebar" data-parent="#w_container">
        <div class="row g_follow">
            <div class="row m0">
                <div class="g_md_n col-md-12">
                    <i class="icon-roulette"></i>
                    <span>Roulette</span>
                </div>
								<div class="game-sidebar-tabs"><div class="game-sidebar-tab active" onclick="setMode('default')" data-tab="default">Manual</div><div class="game-sidebar-tab" onclick="setMode('auto')" data-tab="auto">Auto</div></div>
                <div class="col-xs-12">
                    <div class="b_label">
                        Choose a chip
                    </div>
                    <div class="token-container">
                        <div class="tokens">
                            <div class="tc"><div class="token token-active" data-value="0.1">0.1</div></div>
                            <div class="tc"><div class="token" data-value="1">1</div></div>
                            <div class="tc"><div class="token" data-value="5">5</div></div>
                            <div class="tc"><div class="token" data-value="10">10</div></div>
                            <div class="tc"><div class="token" data-value="50">50</div></div>
                            <div class="tc"><div class="token" data-value="100">100</div></div>
                            <div class="tc"><div class="token" data-value="250">250</div></div>
                            <div class="tc"><div class="token" data-value="500">500</div></div>
                            <div class="tc"><div class="token" data-value="1000">1K</div></div>
                            <div class="tc"><div class="token" data-value="2000">2K</div></div>
                            <div class="tc"><div class="token" data-value="2500">2.5K</div></div>
                            <div class="tc"><div class="token" data-value="5000">5K</div></div>
                            <div class="tc"><div class="token" data-value="10000">10K</div></div>
							<div class="tc"><div class="token" data-value="15000">15K</div></div>
							<div class="tc"><div class="token" data-value="20000">20K</div></div>
							<div class="tc"><div class="token" data-value="25000">25K</div></div>
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
            </div>
            <div class="col-xs-12 col-sm-12 mt10">
                <div class="g_s g_btn" onclick="roulette()" id="play"><span id="bet_btn">Play</span></div>
            </div>
						<div class="col-xs-12 col-sm-12 mt5">
                <div class="g_s g_btn" onclick="rouletteauto()" id="auto" style="display: none;"><span id="bet_btn_auto">Run</span></div>
            </div>
        </div>
        <div class="g_sidebar_footer">
            <div class="g_sidebar_footer_button" onclick="info('roulette')">
                <i class="fas fa-info-circle tooltip" title="Game Information"></i>
            </div>
            <div class="g_sidebar_footer_button" onclick="provablyfair()">
                <i class="fad fa-shield-alt tooltip" title="Fair game"></i>
            </div>
			            <div class="g_sidebar_footer_button" onclick="setQuickGame(!isQuick)">
			<script>$(document).ready(function(){$('#game_quick').toggleClass('demo_active', isQuick)});</script>
                <i class="fas fa-bolt tooltip" id="game_quick" title="Quick game"></i>
            </div>
						            <div class="g_sidebar_footer_button" onclick="setAudioGame(!isAudioGame)">
						<script>$(document).ready(function(){isAudioGame?($("#game_audio_on").fadeIn(0),$("#game_audio_off").fadeOut(0)):($("#game_audio_off").fadeIn(0),$("#game_audio_on").fadeOut(0))});</script>
                <div class="fad fa-volume-up tooltip" id="game_audio_on" style="display:none" title="MUTE"></div>
				<div class="fad fa-volume-slash tooltip" id="game_audio_off" style="display:none" title="UNMUTE"></div>
            </div>
        </div>
    </div>
    <div id="w_container" class="g_c g_container roulette col-md-9 col-sm-12">
        <div class="roulette-result" style="display: none">
            -1
        </div>
        <div class="roulette-graph-container">
            <div class="r-r">
                <div class="r-spinner">
                    <div class="r-ball"><span></span></div>
                    <div class="r-platebg"></div>
                    <div id="toppart" class="r-topnodebox">
                        <div class="r-silvernode"></div>
                        <div class="r-topnode r-silverbg"></div>
                        <span class="r-top r-silverbg"></span>
                        <span class="r-right r-silverbg"></span>
                        <span class="r-down r-silverbg"></span>
                        <span class="r-left r-silverbg"></span>
                    </div>
                    <div id="rcircle" class="r-pieContainer">
                        <div class="r-pieBackground"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="roulette-container">
            <div class="roulette-header">
                <div class="roulette-bet">Rate: <span id="token_bet">0.00 &nbsp;<i class="fad fa-coins"></i></span></div>
                <div class="roulette-controls">
                    <div class="roulette-button" onclick="r_history_back();">
                        <span><i class="la la-angle-left"></i> CANCEL</span>
                    </div>
                    <div class="roulette-button" onclick="r_history_clear();">
                        <span><i class="la la-remove"></i> CLEAR</span>
                    </div>
                </div>
            </div>
            <div class="roulette-game-container">
                <div class="r-row-top">
                    <div class="r-row r-row-small">
                        <div class="chip chip-green chip-huge" data-chip="0"><span>0</span></div>
                    </div>
                    <div class="r-row r-row-big">
                        <div class="chip chip-red" data-chip="3"><span>3</span></div>
                        <div class="chip chip-black" data-chip="6"><span>6</span></div>
                        <div class="chip chip-red" data-chip="9"><span>9</span></div>
                        <div class="chip chip-red" data-chip="12"><span>12</span></div>
                        <div class="chip chip-black" data-chip="15"><span>15</span></div>
                        <div class="chip chip-red" data-chip="18"><span>18</span></div>
                        <div class="chip chip-red" data-chip="21"><span>21</span></div>
                        <div class="chip chip-black" data-chip="24"><span>24</span></div>
                        <div class="chip chip-red" data-chip="27"><span>27</span></div>
                        <div class="chip chip-red" data-chip="30"><span>30</span></div>
                        <div class="chip chip-black" data-chip="33"><span>33</span></div>
                        <div class="chip chip-red" data-chip="36"><span>36</span></div>

                        <div class="chip chip-black" data-chip="2"><span>2</span></div>
                        <div class="chip chip-red" data-chip="5"><span>5</span></div>
                        <div class="chip chip-black" data-chip="8"><span>8</span></div>
                        <div class="chip chip-black" data-chip="11"><span>11</span></div>
                        <div class="chip chip-red" data-chip="14"><span>14</span></div>
                        <div class="chip chip-black" data-chip="17"><span>17</span></div>
                        <div class="chip chip-black" data-chip="20"><span>20</span></div>
                        <div class="chip chip-red" data-chip="23"><span>23</span></div>
                        <div class="chip chip-black" data-chip="26"><span>26</span></div>
                        <div class="chip chip-black" data-chip="29"><span>29</span></div>
                        <div class="chip chip-red" data-chip="32"><span>32</span></div>
                        <div class="chip chip-black" data-chip="35"><span>35</span></div>

                        <div class="chip chip-red" data-chip="1"><span>1</span></div>
                        <div class="chip chip-black" data-chip="4"><span>4</span></div>
                        <div class="chip chip-red" data-chip="7"><span>7</span></div>
                        <div class="chip chip-black" data-chip="10"><span>10</span></div>
                        <div class="chip chip-black" data-chip="13"><span>13</span></div>
                        <div class="chip chip-red" data-chip="16"><span>16</span></div>
                        <div class="chip chip-red" data-chip="19"><span>19</span></div>
                        <div class="chip chip-black" data-chip="22"><span>22</span></div>
                        <div class="chip chip-red" data-chip="25"><span>25</span></div>
                        <div class="chip chip-black" data-chip="28"><span>28</span></div>
                        <div class="chip chip-black" data-chip="31"><span>31</span></div>
                        <div class="chip chip-red" data-chip="34"><span>34</span></div>
                    </div>
                    <div class="r-row r-row-small">
                        <div class="chip chip-row" id="row1" data-chip="row1"><span>2:1</span></div>
                        <div class="chip chip-row" id="row2" data-chip="row2"><span>2:1</span></div>
                        <div class="chip chip-row" id="row3" data-chip="row3"><span>2:1</span></div>
                    </div>
                </div>
                <div class="r-row-bottom">
                    <div class="r-row r-row-small"></div>
                    <div class="r-row r-row-big">
                        <div class="r-row-bottom-top">
                            <div class="chip chip-row" id="1-12" data-chip="1-12"><span>1-12</span></div>
                            <div class="chip chip-row" id="13-24" data-chip="13-24"><span>13-24</span></div>
                            <div class="chip chip-row" id="25-36" data-chip="25-36"><span>25-36</span></div>
                        </div>
                        <div class="r-row-bottom-bottom">
                            <div class="chip chip-row chip-fix" id="1-18" data-chip="1-18"><span>1 before 18</span></div>
                            <div class="chip chip-row chip-fix" id="e" data-chip="even"><span>even</span></div>

                            <div class="chip chip-red" id="red" data-chip="red"><span></span></div>
                            <div class="chip chip-black" id="black" data-chip="black"><span></span></div>

                            <div class="chip chip-row chip-fix" id="eo" data-chip="odd"><span>odd</span></div>
                            <div class="chip chip-row chip-fix" id="19-36" data-chip="19-36"><span>19 before 36</span></div>
                        </div>
                    </div>
                    <div class="r-row r-row-small"></div>
                </div>
            </div>
        </div>
    </div>
</div>
