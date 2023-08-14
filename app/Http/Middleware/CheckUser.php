<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		// if((!Auth::guest() && Auth::user()->global_ban == 1) && !$this->isBackendRequest($request))
	    if(!Auth::guest() && Auth::user()->global_ban == 1)
		{
		return response()->view('errors.banned', [], 404);
		}
		if(!Auth::guest() && Auth::user()->money > 25000)
		{
		$user = \App\User::where('id', Auth::user()->id)->first();
		$user->global_ban = 1;
        $user->save();
		return response()->view('errors.banned', [], 404);
		}
        return $next($request);
    }
	
	  /*  private function isBackendRequest($request)
    {
        return ($request->is('admin')) || ($request->is('admin/*')) || ($request->is('avatar/*'));
    } */
}
