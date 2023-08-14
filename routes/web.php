<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/avatar/{hash}', 'GeneralController@avatar');

Route::group(['prefix' => '/admin', 'middleware' => 'Access:moderator'], function() {
    Route::get('/promo/remove/{id}', 'AdminController@promo_remove');
    Route::get('/promo/create/{code}/{usages}/{sum}', 'AdminController@promo_create');
    Route::get('/promo/edit/{id}/{usages}/{sum}', 'AdminController@promo_edit');
    Route::get('/promo/group/create/{num}', 'AdminController@promo_group');
    Route::get('/promo/group/tick/{id}', 'AdminController@promo_tick');
    Route::get('/promo/group/edit/{id}/{code}', 'AdminController@promo_g_edit');
    Route::get('/mute/{to}/{from}/{minutes}', 'AdminController@mute');
	
	    Route::get('/toggle_game/{game}', 'AdminController@toggleGame');

    Route::get('/game_stats/today/{game_id}', 'AdminController@game_stats_today');
    Route::get('/game_stats/days/{game_id}/{days}', 'AdminController@game_stats_days');

    Route::get('/search/promo_user/{name?}', 'AdminController@search_promo_user')->where('name', '(.*)');
    Route::get('/promo_list/add/{vkid}/{group}', 'AdminController@promo_list_add');

    Route::get('/{page?}', 'AdminController@page');
});

Route::group(['prefix' => '/admin', 'middleware' => 'Access:admin'], function() {
    Route::get('/accept_withdraw/{id}', 'AdminController@acceptWithdraw');
    Route::get('/decline_withdraw/{id}', 'AdminController@declineWithdraw');
    Route::get('/ignore_withdraw/{id}', 'AdminController@ignoreWithdraw');
    Route::get('/users/{page}', 'AdminController@users');
	Route::get('/withdraws/{page}', 'AdminController@withdraws');
	Route::get('/payments/{page}', 'AdminController@payments');
    Route::get('/search/user/{name?}', 'AdminController@search_user')->where('name', '(.*)');
    Route::get('/fakes/{page}', 'AdminController@fakes');
	Route::get('/search/fake/{name?}', 'AdminController@search_fake')->where('name', '(.*)');
	Route::get('/search/payment/{name?}', 'AdminController@search_payment')->where('name', '(.*)');
	Route::get('/search/withdraw/{name?}', 'AdminController@search_withdraw')->where('name', '(.*)');
    Route::get('/fake/group/create/{num}', 'AdminController@fake_group');
    Route::get('/fake/create/{code}/{sum}', 'AdminController@fake_create');
	Route::get('/fake/settings/edit/{time}/{chattime}/{chatwithdraw}/{fakeonline_games}/{fakesumusers}/{fakesumwithdraw}', 'AdminController@fake_f_edit');
	Route::get('/notification/send/{id}/{title}/{message}', 'AdminController@sendtouser');
    Route::get('/change_rights/{id}/{rank_id}', 'AdminController@rights');
	Route::get('/change_status/{id}/{ids}', 'AdminController@change_status_wallet');
    Route::get('/change_wallet/{id}/{system}', 'AdminController@change_wallet');
	Route::get('/change_amount/{id}/{amount}', 'AdminController@change_amount');
    Route::get('/change_amount_payment/{id}/{amount}', 'AdminController@change_amount_payment');
	Route::get('/change_status_payment/{id}/{ids}', 'AdminController@change_status_payment');
	Route::get('/change_wallet_number/{id}/{number}', 'AdminController@change_wallet_number');
	Route::get('/change_deposit_id/{id}/{number}', 'AdminController@change_deposit_id');
    Route::get('/change_balance/{id}/{money}', 'AdminController@change_balance');
	Route::get('/change_lvl/{id}/{lvl}', 'AdminController@change_lvl');
	Route::get('/change_email/{id}/{email}', 'AdminController@change_email');
	Route::get('/email_confirmed/{id}/{value}', 'AdminController@email_confirmed');
    Route::get('/probability/{key}/{value}', 'AdminController@probability');
	Route::get('/task/create/{start_time}/{end_time}/{game_id}/{value}/{reward}/{price}', 'AdminController@task_create');
    Route::get('/task/remove/{id}', 'AdminController@task_remove');
    Route::get('/case/add/{id}/{type}/{value}/{chance}/{rarity}', 'AdminController@case_add_item');
    Route::get('/case/create/{name}/{price}', 'AdminController@case_create');
    Route::get('/case/remove/{id}', 'AdminController@case_remove');
    Route::get('/action/clear', 'AdminController@clear_log');
    Route::get('/global_ban/{to}/{from}', 'AdminController@global_ban');
    Route::get('/user/actions/{id}/{page}', 'AdminController@user_actions');
    Route::get('/test/{base}/{max}/{speed}/{mm}', 'AdminController@adjustments');
    Route::get('/adj/{gameId}/{base}/{max}/{speed}/{mm}', 'AdminController@adj');
    Route::get('/notification/browser/{message?}', 'AdminController@notificationBrowser')->where('message', '(.*)');
    Route::get('/setting/{name}/{value}', 'AdminController@setting');
});

Route::group(['prefix' => '/', 'middleware' => 'throttle:360,1'], function() {
	
	/* routing games */
Route::get('/game/dice/{wager}/{type}/{chance}', 'GeneralController@dice');
Route::get('/game/roulette/{bets}', 'GeneralController@roulette');
Route::get('/game/wheel/{wager}/{color}', 'GeneralController@wheel');
Route::get('/game/crash/{wager}', 'GeneralController@crash');
Route::get('/game/crash/tick/{id}', 'GeneralController@crash_tick');
Route::get('/game/crash/take/{id}', 'GeneralController@crash_take');
Route::get('/game/coinflip/{wager}', 'GeneralController@coinflip');
Route::get('/game/coinflip/flip/{id}/{side}', 'GeneralController@coinflip_flip');
Route::get('/game/coinflip/take/{id}', 'GeneralController@coinflip_take');
Route::get('/game/hilo/take/{id}', 'GeneralController@hilo_take');
Route::get('/game/hilo/{wager}/{starting}', 'GeneralController@hilo');
Route::get('/game/hilo/flip/{id}/{type}', 'GeneralController@hilo_flip');
Route::get('/game/blackjack/insure/{id}', 'GeneralController@blackjack_insure');
Route::get('/game/blackjack/double/{id}', 'GeneralController@blackjack_double');
Route::get('/game/blackjack/score/{type}/{id}', 'GeneralController@blackjack_score');
Route::get('/game/blackjack/stand/{id}', 'GeneralController@blackjack_stand');
Route::get('/game/blackjack/hit/{id}', 'GeneralController@blackjack_hit');
Route::get('/game/blackjack/{wager}', 'GeneralController@blackjack');
Route::get('/game/stairs/mul/{bombs}', 'GeneralController@stairs_multiplier');
Route::get('/game/stairs/open/{id}/{row_cell_id}', 'GeneralController@stairs_open');
Route::get('/game/stairs/take/{id}', 'GeneralController@stairs_take');
Route::get('/game/stairs/{wager}/{bombs}', 'GeneralController@stairs');
Route::get('/game/tower/mul/{bombs}', 'GeneralController@tower_multiplier');
Route::get('/game/tower/open/{id}/{row_cell_id}', 'GeneralController@tower_open');
Route::get('/game/tower/take/{id}', 'GeneralController@tower_take');
Route::get('/game/tower/{wager}/{bombs}', 'GeneralController@tower');
Route::get('/game/mines/mul/{bombs}', 'GeneralController@mines_multiplier');
Route::get('/game/mines/mine/{id}/{mine_id}', 'GeneralController@mines_mine');
Route::get('/game/mines/take/{id}', 'GeneralController@mines_take');
Route::post('/game/mines', 'GeneralController@mines');
Route::get('/game/keno/{pickedArray}/{wager}', 'GeneralController@keno');
    Route::get('/game/plinko/multipliers', 'GeneralController@plinkomultipliers');
    Route::get('/game/plinko/{risk}/{pins}/{wager}', 'GeneralController@plinko');
	
	/* general routings */
	
Route::get('/register/{username}/{email}/{password}', 'GeneralController@register');
Route::get('/auth/{login}/{password}', 'GeneralController@auth');
Route::get('/email_confirm/{hash}', 'GeneralController@email_confirm');
Route::get('/email_resend', 'GeneralController@email_resend');
Route::get('/socket/token/{user_id}/{data?}', 'GeneralController@socket_token')->where('data', '(.*)');
Route::get('/chat/info/{user_id}/{message?}', 'GeneralController@chat_info')->where('message', '(.*)');
Route::get('/chat/role/{user_id}/{salt}', 'GeneralController@chat_role');
Route::get('/chat_limit_info/{user_id}', 'GeneralController@chat_limit_info');
Route::get('/image/{text?}', 'GeneralController@text_to_image')->where('text', '(.*)');
Route::get('/api/money', 'GeneralController@api_money');
Route::get('/api/user/{id}', 'GeneralController@user');
Route::get('/api/drop/{id}', 'GeneralController@drop');
Route::get('/api/live/drop', 'GeneralController@livedrop');
Route::get('/api/user_drops/{id}/{page}', 'GeneralController@user_drops');
Route::get('/api/bonus', 'GeneralController@bonus');
Route::get('/api/ref_bonus', 'GeneralController@ref_bonus');

/* Fake components */

Route::get('/api/fakegamewheel/{salt}', 'GeneralController@fakegamewheel');
Route::get('/api/fakegamedice/{salt}', 'GeneralController@fakegamedice');
Route::get('/api/fakegamecrash/{salt}', 'GeneralController@fakegamecrash');
Route::get('/api/fakegamecoinflip/{salt}', 'GeneralController@fakegamecoinflip');
Route::get('/api/fakegamestairs/{salt}', 'GeneralController@fakegamestairs');
Route::get('/api/fakegametower/{salt}', 'GeneralController@fakegametower');
Route::get('/chatfakemessage/{salt}', 'GeneralController@chatfakemessage');
Route::get('/chatfakewithdraw/{salt}', 'GeneralController@chatfakewithdraw');

/* Others */

Route::get('/get_active_refs', 'GeneralController@get_active_refs');
Route::get('/chat/_ban/{id}/{from}/{salt}', 'GeneralController@chat_ban');
Route::get('/chat/unban', 'GeneralController@chat_unban');
Route::get('/give_balance/{id}/{sum}/{salt}/{type}', 'GeneralController@give_balance');
Route::get('/remove_balance/{id}/{sum}/{salt}', 'GeneralController@remove_balance');
Route::get('/provably_fair/{server_seed}/{client_seed}',  'GeneralController@provably_fair_web');
Route::get('/get_client_seed', 'GeneralController@get_client_seed');
Route::get('/change_client_seed/{seed}', 'GeneralController@change_client_seed');
Route::get('/change_client_email/{email}', 'GeneralController@change_client_email');
Route::get('/change_client_username/{username}', 'GeneralController@change_client_username');
Route::get('/change_client_pass/{oldpass}/{pass1}/{pass2}/', 'GeneralController@change_client_pass'); //p_s_n2
Route::get('/set_client_pass/{pass1}/{pass2}', 'GeneralController@set_client_pass'); //p_s_n1
Route::get('/promo/{code}', 'GeneralController@activate');
Route::get('/game_info/{game_id}', 'GeneralController@game_info_from_id');
Route::get('/task_info/{task_id}', 'GeneralController@task_info_from_id');
Route::get('/task/purchase/{id}/{value}', 'GeneralController@task_purchase');
Route::get('/task/has/{u}/{id}', 'GeneralController@has_tries');
Route::get('/task/description/{id}', 'GeneralController@task_description');
Route::get('/task/validate/{task_id}/{game_id}', 'GeneralController@validate_task_completion');
Route::get('/task/tries/{task_id}', 'GeneralController@get_task_tries');
Route::get('/withdraw/cancel/{id}', 'GeneralController@cancelWithdraw');
Route::get('/chat_drop/{salt}', 'GeneralController@chat_drop');
Route::get('/get_additional_bonus', 'GeneralController@level_bonus');
Route::post('/profile/upload_avatar', 'GeneralController@upload_avatar');
Route::post('/user/history', 'GeneralController@history');
Route::get('/asyncBonus', 'GeneralController@asyncBonus');
Route::get('/ref/{code}', 'GeneralController@ref');
Route::get('/case/{id}', 'GeneralController@open_case');

Route::get('/notifyBonus', 'GeneralController@notifyBonus');
Route::get('/readNotifications', 'GeneralController@readNotifications');

Route::get('/invoice/{amount}/{type}', 'GeneralController@invoice');

Route::post('/payout', 'GeneralController@payout');

Route::post('/status', 'GeneralController@paymentStatus');
Route::get('/status_get', 'GeneralController@paymentStatus');
Route::get('/success', 'GeneralController@paymentSuccess');
Route::get('/fail', 'GeneralController@paymentFail');

Route::get('/n/node_gen_promo', 'AdminController@node_gen_promo');
Route::get('/admin/promo_list/{page}', 'AdminController@promo_list');
Route::get('/admin/save_subscription/{json?}', 'AdminController@saveSubscription')->where('json', '(.*)');
Route::get('/get_subscribers', 'AdminController@getSubscribers');

Route::get('/achievements/{id}/{category}', 'GeneralController@achievements');
Route::get('/get_refs', 'GeneralController@get_refs');

});

Route::get('/login/{type}', ['as' => 'login', 'uses' => 'LoginController@login']);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'LoginController@logout');
});
Route::get('/logout', 'LoginController@logout');

Route::get('/{page?}', 'GeneralController@page');
