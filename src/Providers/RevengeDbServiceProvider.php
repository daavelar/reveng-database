<?php namespace Daavelar\RevengeDb\Providers;

use Daavelar\RevengeDb\Commands\Migrations;
use Illuminate\Support\ServiceProvider;

class RevengeDbServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['revengedb.migrations'] = $this->app->share(function ($app) {
            return new Migrations;
        }); $this->commands('revengedb.migrations');
    }
}