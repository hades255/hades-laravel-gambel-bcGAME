<div class="faq-q">
		<div class="window-heading">
			Help
		</div>

		<div class="window-body">
			<div class="text-heading">Any questions?</div>
			<div class="contact-us">
				<div class="contact">
					<div class="contact__image">
						<span class="myicon-telegram"></span>
					</div>
					<div class="contact__info">
						<div class="contact__title">
							Telegram Support
						</div>
						<div class="contact__link">
							<a href="https://t.me/gambel_support" class="colored-link" target="_blank">telegram.com</a>
						</div>
						<div class="contact-time">
							Average response time - <span style="color: #fff">20 minutes</span>
						</div>
					</div>
					<div class="contact__goto tooltip" title="Go">
						<a href="https://t.me/gambel_support" target="_blank">
							<span class="fas fa-chevron-down"></span>
						</a>
					</div>
				</div>
				<div class="contact">
					<div class="contact__image">
						<span class="far fa-envelope"></span>
					</div>
					<div class="contact__info">
						<div class="contact__title">
							E-mail support
						</div>
						<div class="contact__link">
							<a href="mailto:{{$settings->support_email}}" class="colored-link" target="_blank">{{$settings->support_email}}</a>
						</div>
						<div class="contact-time">
							Average response time -<span style="color: #fff">24h-48h</span>
						</div>
						<div class="contact__goto tooltip" title="Go">
							<a href="mailto:{{$settings->support_email}}" target="_blank">
								<span class="fas fa-chevron-down"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="text-heading" style="margin-top: 20px;">Frequently asked Questions</div>
		
			<div id="accordion" class="ui-accordion ui-widget ui-helper-reset" role="tablist">
			
			<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Gambel casino</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					{{$settings->namesite}} - games with money withdrawal. The site offers 13 games with exciting mechanics and high winning odds.
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How to play?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					Go to the page of any game, click on the button with the icon <i class="fas fa-info-circle tooltip" title="help"></i>, a window with instructions for the game will open in front of you, then specify the amount of the bet and click "Play".
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Demo mode</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					Demo mode is activated when the user is not authorized on the site. You can also activate a demo account by clicking on the icon <i class="fad fa-coins game_info-icon_info"></i> near the balance in the upper right corner of the site. It exists only for training - these funds cannot be withdrawn, and the game history will not be saved. In this mode, money is not debited or credited, giving you the opportunity to try to play all the games without fear for your balance.
				</div>
			
				<div class="help-q ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed kk ui-corner-all" role="tab" id="ui-id-1" aria-controls="ui-id-2" aria-selected="false" aria-expanded="false" tabindex="0" style="border-bottom-width: 1px; border-bottom-right-radius: 4px; border-bottom-left-radius: 4px;"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How to get free coins?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-2" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="true" style="display: none;">
					<div class="help-a__way">Method 1</div>
					<p class="help-a__text">Subscribe to our group <a href="https://t.me/gambel_vip" target="_blank" class="colored-link">telegram</a> or go to page <a href="javascript:void(0)" onclick="@if(Auth::guest()) $('#b_si').click(); @else load('/bonus'); @endif" class="colored-link">Bonuses</a>.</p>
					<div class="help-a__way">Method 2</div>
					<p class="help-a__text">Subscribe to our group <a href="https://t.me/gambel_vip" target="_blank" class="colored-link">telegram</a>, where promo codes are published daily. You can activate the promo code in the "Promo code" tab on the page <a href="javascript:void(0)" onclick="@if(Auth::guest()) $('#b_si').click(); @else load('/bonus'); @endif" class="colored-link">Bonuses</a>.</p>
					<div class="help-a__way">Method 3</div>
					<p class="help-a__text">Register on the site using the referral link and get a welcome bonus.</p>
					<div class="help-a__way">Method 4</div>
					<p class="help-a__text">Raise your level and get one-time promotion bonuses, as well as increased permanent bonuses.</p>
					<div class="help-a__way">Method 5</div>
					<p class="help-a__text">Answer quizzes, complete tasks and invite referrals using your individual link.</p>
					<div class="help-a__way">Method 6</div>
					<p class="help-a__text">Chat, help other players and get a bonus from the administration at random times.</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How is the in-game currency converted?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					1 coin = 1 Usd.
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-9" aria-controls="ui-id-10" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How to top up an account?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-10" aria-labelledby="ui-id-9" role="tabpanel" aria-hidden="true" style="display: none;">
					Go to your <a onclick="$('.md-wallet').toggleClass('md-show', true)" class="colored-link">Wallet</a>, select the amount and method of payment, read the commissions and click the "Pay" button.
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-11" aria-controls="ui-id-12" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>I topped up the account, but the money did not come</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-12" aria-labelledby="ui-id-11" role="tabpanel" aria-hidden="true" style="display: none;">
					В In case of a similar problem, write to support indicating: payment date, payment method, payment details. If your time zone is not UTC+3:00, enter your time zone or city/region of residence.
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-13" aria-controls="ui-id-14" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How to withdraw money?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-14" aria-labelledby="ui-id-13" role="tabpanel" aria-hidden="true" style="display: none;">
					Go to your <a onclick="$('.md-wallet').toggleClass('md-show', true)" class="colored-link">Wallet</a>, select the "Withdrawal" tab, select the withdrawal method and amount, enter your wallet, review the fees and click the "Withdraw" button.
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-15" aria-controls="ui-id-16" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Error appears on output</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-16" aria-labelledby="ui-id-15" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">If an error occurs during the withdrawal, carefully read its contents. 
						As a rule, the text of the error indicates how to fix it. The main reasons why the administration has the right to refuse a withdrawal include: </p>
					<div class="help-a__way">Reason 1</div>
					<p class="help-a__text">You have multiple accounts. Please contact support for further details.</p>
					<div class="help-a__way">Reason 2</div>
					<p class="help-a__text">The amount of replenishment has not been wagered. Replenishment must be wagered in a single amount on any modes at odds not lower than x1.30.</p>
					<div class="help-a__way">Reason 3</div>
					<p class="help-a__text">You have specified an invalid or suspicious withdrawal wallet (for example, in local, not international format).</p>
					<div class="help-a__way">Reason 4</div>
					<p class="help-a__text">You are trying to withdraw to an anonymous Yandex.Wallet. To resolve this error, change the withdrawal method or upgrade your wallet status.</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-17" aria-controls="ui-id-18" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>I made a withdrawal, but the coins returned to the balance</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-18" aria-labelledby="ui-id-17" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">This situation means that the withdrawal was canceled manually by the site administration. 
						This is a rare situation that occurs when you suspect a violation of the rules on your part or an incorrectly specified wallet by you. In such cases, the administration always indicates the reason for canceling the withdrawal. It can be viewed in <a href="javascript:void(0)" onclick="@if(Auth::guest()) $('#b_si').click(); @else load('/user?id={{Auth::user()->id}}'); @endif" class="colored-link">Profile</a> in the "Payments" tab in the "Status" column.</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-19" aria-controls="ui-id-20" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>The withdrawal was made, but the money did not come</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-20" aria-labelledby="ui-id-19" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">The "Success" status means that we have sent your payment. It may take some time between sending and enrollment, on average about 5 minutes. If the funds do not arrive for a long time (more than 12 hours), contact support.</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-21" aria-controls="ui-id-22" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Do I need to fund my account to withdraw?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-22" aria-labelledby="ui-id-21" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						To withdraw, you only need to have a deposit of 50 dollar. 
					</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-25" aria-controls="ui-id-26" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How to transfer money to another player?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-26" aria-labelledby="ui-id-25" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						This option is not provided.
					</p>
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-27" aria-controls="ui-id-28" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>How to create your promo code?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-28" aria-labelledby="ui-id-27" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						This option is not provided. 
						However, if you are a regular player or partner, you can contact support with a request to create a promotional code using your game balance or using PR of our site.
					</p>
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-29" aria-controls="ui-id-30" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Do I need to wager bonus money?</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-30" aria-labelledby="ui-id-29" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						Free coins received with the help of bonuses, promotional codes (regular, not for replenishment), as well as those issued by the administration, must be wagered in a single amount on any modes at coefficients not lower than x1.50.
					</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-31" aria-controls="ui-id-32" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Chat rules</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-32" aria-labelledby="ui-id-31" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						The chat is prohibited: <br>
						-&nbsp; Insults against other players and the administration, including veiled ones.<br>
						-&nbsp; Links, wallets. <br>
						-&nbsp; Begging. <br>
						-&nbsp; Drain promo codes. <br>
						-&nbsp; Spam, any kind of advertising. <br>
						For violation of the rules, the administration has the right to deprive you of the opportunity to communicate in the chat. In some cases, the administration may issue you a permanent account ban.
					</p>
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Fair game</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					The random number generator generates provable and completely fair random numbers that are used to determine the outcome of every game played on the site. Each user can check the outcome of any game in a completely deterministic way. By providing a single parameter, the client's hash, to the random number generator inputs, {{$settings->namesite}} cannot manipulate the results to its advantage. The {{$settings->namesite}} random number generator allows each game to request any number of random numbers from a given client seed, server seed, and nonce. You can find out more about how it works on the fair play page.
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Affiliate program</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					Invite other players to our site with your referral link and earn money. Details can be found in your profile.
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Rain/Snow</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
					Rain or Snow is a chat bot that distributes a random number of times a day the balance to random players who are online on the site and have replenished the balance in the last 24 hours.
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Quizzes</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
                The quiz can be conducted automatically in the form of simple questions, or by site moderators. The first player to answer the question correctly receives a reward.
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Tasks</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
                 Take part in weekly challenges and win prizes! Each task has a condition that must be met in order to receive a reward. To participate in the challenge, purchase one or more attempts. Attempts are spent after each game, regardless of its result. Play games as usual - we will let you know about everything that is required: the number of remaining attempts, as well as whether you have fulfilled the condition or not!
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Tactics</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
                There are no tactics that are guaranteed to work. It all depends on your playing style: fast with a lot of risk or slow but sure.
				</div>



                <div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-3" aria-controls="ui-id-4" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>I lost the score</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">
                There is not a single game on our site with a 100% chance of winning. Even 99.9% is a 1 in 1000 chance that you can lose. For example in the game Stairs, when you play on 1 stone, there is a 1 in 20 (5%) chance that you will lose. Therefore, playing on our site, you can win or lose. We do not interfere in the gameplay in any way, so everything depends only on your luck. We can never change the result of your game, so on your part there is such a line called “Client hash”. Initially, the "Client hash" is generated automatically, but you can always change it and specify any characters there. To check the results of your games, click on any of your games in the history and in the window that appears below you will see the field "Server hash" To check the result of the game - you need to go to the "Fair game" page, insert "Server hash" - and you will see the result of the game . We advise you to play more accurately. Develop your own betting styles and play them. Do not flirt, know how to stop in time and withdraw money. Gambling is designed to entertain. Remember that you are risking money when you place bets. Don't spend more than you can afford to lose.
				</div>

				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-35" aria-controls="ui-id-36" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Reviews</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-36" aria-labelledby="ui-id-35" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						Reviews are available in our groups in social networks.
					</p>
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-35" aria-controls="ui-id-36" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>Jobs</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-36" aria-labelledby="ui-id-35" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						The list of vacancies is available at <a href="/job" class="colored-link">this page</a>. Please note that it may be empty for a long time - we do not always need new people to join the team.
					</p>
				</div>
				
				<div class="help-q ui-accordion-header ui-corner-top ui-accordion-header-collapsed  ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-id-33" aria-controls="ui-id-34" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>I changed my mind about taking</div>
				<div class="help-a ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-34" aria-labelledby="ui-id-33" role="tabpanel" aria-hidden="true" style="display: none;">
					<p class="help-a__text">
						If the status of the withdrawal is "In Progress", you can cancel it in <a href="javascript:void(0)" onclick="@if(Auth::guest()) $('#b_si').click(); @else load('/user?id={{Auth::user()->id}}'); @endif" class="colored-link">Profile</a> in the "Conclusions" tab in the "Status" column by clicking on the cancel button.
					</p>
				</div>

			</div>
		</div>
	</div>