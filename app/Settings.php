<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['namesite', 'vk_url', 'keywords', 'telegram_url', 'support_email', 'techworks', 'build', 'system_key', 'chance','yt_chance', 'promo_sum', 'promo_percent', 'min_with',
        'ap_id', 'ap_secret', 'payment_disabled', 'ap_api_key', 'ap_api_id',
        'max_bet_increase', 'min_in', 'vk_service',
        'warn_enabled', 'warn_title', 'warn_text', 'slide_enabled', 'slide_title', 'slide_text', 'slider', 'temp_promo_sum',
        'crash_s', 'crash_m', 'crash_b', 'crash_h', 'crash_u', 'game_fake', 'time_fake', 'realtime_fake', 'chat_fake', 'realtime_chat_fake', 'time_chat_fake', 'live_fake', 'realtime_live_fake', 'time_live_fake', 'withdraw_fake', 'withdraw_time_fake', 'realtime_withdraw_fake', 'fakesumwithdraw', 'fakesumusers', 'fakeonline_games', 
		'google_client_id', 'google_client_secret', 'facebook_client_id', 'facebook_client_secret', 'vk_client_id', 'vk_client_secret', 'minfakebet', 'maxfakebet', 'messages_secret', 'min_withdraw_dep'
    ];
}
