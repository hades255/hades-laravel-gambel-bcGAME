<div id="__ajax_title" style="display: none">Settings</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @if(Auth::user()->chat_role < 3)
        You do not have access to this information
    @else
        <div class="row">
            <div class="col-lg-4">
                <div class="kt-portlet" id="paysys">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Payment system <small>freekassa</small>
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>ID:</label>
                                <input id="paysys_id" value="{{$settings->ap_id}}" type="text" class="form-control" placeholder="ID"
                                    oninput="delayedv('#paysys_id', function(v) { send('#paysys', '/admin/setting/ap_id/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Secret word #1:</label>
                                <input id="paysys_secret" value="{{$settings->ap_secret}}" type="text" class="form-control" placeholder="The secret key"
                                    oninput="delayedv('#paysys_secret', function(v) { send('#paysys', '/admin/setting/ap_secret/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Secret word #2:</label>
                                <input id="paysys_api" value="{{$settings->ap_api_key}}" type="text" class="form-control" placeholder="API key"
                                   oninput="delayedv('#paysys_api', function(v) { send('#paysys', '/admin/setting/ap_api_key/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Minimum amount for replenishment:</label>
                                <input id="paysys_minin" value="{{$settings->min_in}}" type="text" class="form-control" placeholder="Minimum amount for replenishment"
                                       oninput="delayedv('#paysys_minin', function(v) { send('#paysys', '/admin/setting/min_in/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Minimum withdrawal amount:</label>
                                <input id="paysys_minwith" value="{{$settings->min_with}}" type="text" class="form-control" placeholder="Minimum withdrawal amount"
                                    oninput="delayedv('#paysys_minwith', function(v) { send('#paysys', '/admin/setting/min_with/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Minimum deposit amount for withdrawal:</label>
                                <input id="min_withdraw_dep" value="{{$settings->min_withdraw_dep}}" type="text" class="form-control" placeholder="Minimum deposit amount for withdrawal"
                                    oninput="delayedv('#min_withdraw_dep', function(v) { send('#paysys', '/admin/setting/min_withdraw_dep/'+v) })">
                            </div>
                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="paysys_enabled" @if($settings['payment_disabled'] == 1) checked @endif type="checkbox"
                                           onclick="send('#paysys', '/admin/setting/payment_disabled/'+($('#paysys_enabled').is(':checked') ? '1' : '0'))"> Disable accepting payments from users
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
				                <div class="kt-portlet" id="bots">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Fake bid management
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Fake minimum bet</label>
                                <input id="bots_minfakebet" type="text" value="{{$settings->minfakebet}}" class="form-control" placeholder="Fake bot bet amount, min. 0"
                                    oninput="delayedv('#bots_minfakebet', function(v) { send('#bots', '/admin/setting/minfakebet/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Maximum fake bet</label>
                                <input id="bots_maxfakebet" type="text" value="{{$settings->maxfakebet}}" class="form-control" placeholder="Fake bot bet amount, max. 1кк"
                                    oninput="delayedv('#bots_maxfakebet', function(v) { send('#bots', '/admin/setting/maxfakebet/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="kt-portlet" id="ref">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                affiliate program
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Amount for an active referral/registration using a referral link:</label>
                                <input id="ref_sum" type="text" value="{{$settings->promo_sum}}" class="form-control" placeholder="Amount for referral code"
                                    oninput="delayedv('#ref_sum', function(v) { send('#ref', '/admin/setting/promo_sum/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Amount for a temporary promo code:</label>
                                <input id="temp_sum" type="text" value="{{$settings->temp_promo_sum}}" class="form-control" placeholder="Amount for referral code"
                                    oninput="delayedv('#temp_sum', function(v) { send('#ref', '/admin/setting/temp_promo_sum/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
				<div class="kt-portlet" id="site">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Site
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Name of the site:</label>
                                <input id="namesite" value="{{$settings['namesite']}}" type="text" class="form-control" placeholder="Name of the site"
                                    oninput="delayedv('#namesite', function(v) { send('#site', '/admin/setting/namesite/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>VK group:</label>
                                <input id="vk_url" value="{{$settings['vk_url']}}" type="text" class="form-control" placeholder="VK group, example: uptouch"
                                    oninput="delayedv('#vk_url', function(v) { send('#site', '/admin/setting/vk_url/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Telegram Link:</label>
                                <input id="telegram_url" value="{{$settings['telegram_url']}}" type="text" class="form-control" placeholder="Telegram link, example: teleg.gh/test"
                                    oninput="delayedv('#telegram_url', function(v) { send('#site', '/admin/setting/telegram_url/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Site mail:</label>
                                <input id="support_email" value="{{$settings['support_email']}}" type="text" class="form-control" placeholder="Site mail"
                                    oninput="delayedv('#support_email', function(v) { send('#site', '/admin/setting/support_email/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Keywords:</label>
                                <input id="keywords" value="{{$settings['keywords']}}" type="text" class="form-control" placeholder="Keywords"
                                    oninput="delayedv('#keywords', function(v) { send('#site', '/admin/setting/keywords/'+v) })">
                            </div>
							<div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="build" @if($settings['build'] == 1) checked @endif type="checkbox"
                                        onclick="send('#build', '/admin/setting/build/'+($('#build').is(':checked') ? '1' : '0'))"> Server assembly (debug/release)
                                    <span></span>
                                </label>
                            </div>
							                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="techworks" @if($settings['techworks'] == 1) checked @endif type="checkbox"
                                        onclick="send('#techworks', '/admin/setting/techworks/'+($('#techworks').is(':checked') ? '1' : '0'))"> Technical work (Disable site)
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Settings
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Twist if % of the bet is reached</label>
                                <input id="max_bet_increase" value="{{$settings->max_bet_increase}}" type="text" class="form-control" placeholder="Maximum % of the bet"
                                       oninput="delayedv('#max_bet_increase', function(v) { send('#warn', '/admin/setting/max_bet_increase/'+v) })">
                            </div>
							<div class="form-group">
                                <label>System key of the bot (chat)</label>
                                <input id="system_key" value="{{$settings->system_key}}" type="text" class="form-control" placeholder="Any set of numbers and letters"
                                       oninput="delayedv('#system_key', function(v) { send('#warn', '/admin/setting/system_key/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Messages - secret key <strong>Groups</strong></label>
                                <input id="messages_secret" value="{{$settings->messages_secret}}" type="text" class="form-control" placeholder="The secret key"
                                       oninput="delayedv('#messages_secret', function(v) { send('#warn', '/admin/setting/messages_secret/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Information - service key <strong>Apps</strong></label>
                                <input id="service" value="{{$settings->vk_service}}" type="text" class="form-control" placeholder="Service key"
                                       oninput="delayedv('#service', function(v) { send('#warn', '/admin/setting/vk_service/'+v) })">
                            </div>
                            <h5>Notice on home page</h5>
                            <div class="form-group">
                                <label>Header:</label>
                                <input id="warn_title" value="{{$settings['warn_title']}}" type="text" class="form-control" placeholder="Header"
                                    oninput="delayedv('#warn_title', function(v) { send('#warn', '/admin/setting/warn_title/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Text:</label>
                                <input id="warn_text" value="{{$settings['warn_text']}}" type="text" class="form-control" placeholder="Text"
                                    oninput="delayedv('#warn_text', function(v) { send('#warn', '/admin/setting/warn_text/'+v) })">
                            </div>
                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="warn_enabled" @if($settings['warn_enabled'] == 1) checked @endif type="checkbox"
                                        onclick="send('#warn', '/admin/setting/warn_enabled/'+($('#warn_enabled').is(':checked') ? '1' : '0'))"> Turn on
                                    <span></span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Header:</label>
                                <input id="slide_title" value="{{$settings['slide_title']}}" type="text" class="form-control" placeholder="Header"
                                    oninput="delayedv('#slide_title', function(v) { send('#slide', '/admin/setting/slide_title/'+v) })">
                            </div>
                            <div class="form-group">
                                <label>Text:</label>
                                <input id="slide_text" value="{{$settings['slide_text']}}" type="text" class="form-control" placeholder="Text"
                                    oninput="delayedv('#slide_text', function(v) { send('#slide', '/admin/setting/slide_text/'+v) })">
                            </div>
                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="slide_enabled" @if($settings['slide_enabled'] == 1) checked @endif type="checkbox"
                                        onclick="send('#slide', '/admin/setting/slide_enabled/'+($('#slide_enabled').is(':checked') ? '1' : '0'))"> Turn on
                                    <span></span>
                                </label>
                            </div>
							                            <div class="form-group">
                                <label class="kt-checkbox">
                                    <input id="slider" @if($settings['slider'] == 1) checked @endif type="checkbox"
                                        onclick="send('#slider', '/admin/setting/slider/'+($('#slider').is(':checked') ? '1' : '0'))"> Slider on home page (on/off)
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			            <div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Google Authorization
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Google client id</label>
                                <input id="google_client_id" value="{{$settings->google_client_id}}" type="text" class="form-control" placeholder="Value is not more than 100 characters"
                                       oninput="delayedv('#google_client_id', function(v) { send('#warn', '/admin/setting/google_client_id/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Google client secret</label>
                                <input id="google_client_secret" value="{{$settings->google_client_secret}}" type="text" class="form-control" placeholder="Value is not more than 100 characters"
                                       oninput="delayedv('#google_client_secret', function(v) { send('#warn', '/admin/setting/google_client_secret/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
						            <div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Facebook Authorization
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Facebook client id</label>
                                <input id="facebook_client_id" value="{{$settings->facebook_client_id}}" type="text" class="form-control" placeholder="Value is not more than 100 characters"
                                       oninput="delayedv('#facebook_client_id', function(v) { send('#warn', '/admin/setting/facebook_client_id/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Facebook client secret</label>
                                <input id="facebook_client_secret" value="{{$settings->facebook_client_secret}}" type="text" class="form-control" placeholder="Value is not more than 100 characters"
                                       oninput="delayedv('#facebook_client_secret', function(v) { send('#warn', '/admin/setting/facebook_client_secret/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-lg-4">
                <div class="kt-portlet" id="warn">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Vkontakte authorization
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="form-group">
                                <label>Vk client id</label>
                                <input id="vk_client_id" value="{{$settings->vk_client_id}}" type="text" class="form-control" placeholder="Value is not more than 100 characters"
                                       oninput="delayedv('#vk_client_id', function(v) { send('#warn', '/admin/setting/vk_client_id/'+v) })">
                            </div>
							<div class="form-group">
                                <label>Vk client secret</label>
                                <input id="vk_client_secret" value="{{$settings->vk_client_secret}}" type="text" class="form-control" placeholder="Value is not more than 100 characters"
                                       oninput="delayedv('#vk_client_secret', function(v) { send('#warn', '/admin/setting/vk_client_secret/'+v) })">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>