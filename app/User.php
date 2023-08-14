<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'avatar', 'login', 'login2', 'ref_code','deposit', 'money', 'ref_use','nick', 'uid', 'is_yt', 'is_admin', 'vk_bonus', 'latest_bonus_claim', 'gp_used',
        'chat_role', 'is_chat_banned', 'chat_total_bans', 'email', 'password', 'client_seed', 'email_confirmed', 'email_confirm_hash', 'tasks_completed', 'task_tries',
        'time', 'level', 'exp', 'global_ban', 'mute', 'achievements', 'free_case_time', 'notify_bonus',
        'ref_in_used', 'ref_wheel_used', 'tp_used', 'tp_reset', 'welcome_notification', 'latest_event_time'];

    public static function getRequiredExperience($level) {
        $exp = array(
            2 => 100,
            3 => 250,
            4 => 500,
            5 => 1500,
            6 => 3000,
            7 => 6000,
            8 => 15000,
            9 => 35000,
            10 => 50000,
            11 => 50000
        );
        return $exp[$level];
    }

    public static function getBonusModifier($level) {
        $mod = array(
            2 => 0.01,
            3 => 0.02,
            4 => 0.03,
            5 => 0.05,
            6 => 0.15,
            7 => 0.35,
            8 => 0.65,
            9 => 0.85,
            10 => 1.45,
            11 => 2.2
        );
        return isset($mod[$level]) ? $mod[$level] : 0;
    }

    public static function expPercent($percent, $id = null) {
        if(Auth::guest() && $id == null) return;
        $user = User::where('id', $id == null ? Auth::user()->id : $id)->first();
        if($user == null || $user->level >= 10) return;

        $amount = (int) (($percent / 100) * User::getRequiredExperience($user->level + 1));
        if($user->exp + $amount >= self::getRequiredExperience($user->level + 1)) {
            $user->exp = 0;
            $user->level = $user->level + 1;
        } else $user->exp = $user->exp + $amount;
        $user->save();
    }

    public static function exp($amount, $id = null) {
        if(Auth::guest() && $id == null) return;
        $user = User::where('id', $id == null ? Auth::user()->id : $id)->first();
        if($user == null || $user->level >= 10) return;

        if($user->exp + $amount >= self::getRequiredExperience($user->level + 1)) {
            $user->exp = 0;
            $user->level = $user->level + 1;
        } else $user->exp = $user->exp + $amount;
        $user->save();
    }

    public static function isActivated() {
        if(Auth::guest() || strpos(Auth::user()->login, 'id') !== false) return true;
        return true;
    }

    public static function isSubscribed($id) {
		$base = Settings::where('id', 1)->first();
		$vk_messages = $base->messages_secret;
        try {
            $arr = json_decode(file_get_contents("https://api.vk.com/method/groups.isMember?access_token=". $vk_messages . "&group_id=190401780&user_id=". $id . "&v=5.103"), true);
            return isset($arr['error']) ? false : ($arr['response'] == 1 ? true : false);
        } catch (\Exception $e) {
            return false;
        }
    }

}
