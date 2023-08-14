<?php

namespace App\Providers;

use App\Settings;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
// $this->app['request']->server->set('HTTPS', true);
        //8
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
	// \URL::forceScheme('https');
        view()->share('settings', Settings::where('id', 1)->first());
    }

}
