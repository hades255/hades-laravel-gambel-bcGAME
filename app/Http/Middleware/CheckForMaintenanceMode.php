<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];
	
	protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle($request, Closure $next)
    {
            if ((file_exists(storage_path().'/meta/server.down')) && !$this->isBackendRequest($request))
			{			
			return response()->view('errors.techworks', [], 404);
			}
        return $next($request);
    }

    private function isBackendRequest($request)
    {
        return ($request->is('admin')) || ($request->is('admin/*')) || ($request->is('avatar/*'));
    }
}
