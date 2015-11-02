<?php namespace Daavelar\RevengeDb\Providers;

use Daavelar\RevengeDb\Console\MigrationsCommand;
use Daavelar\RevengeDb\Console\ModelsCommand;
use Daavelar\RevengeDb\Console\RevengeDbCommand;
use Daavelar\RevengeDb\Console\SeedsCommand;
use Illuminate\Support\ServiceProvider;
use Laracasts\Generators\GeneratorsServiceProvider;

class RevengeDbServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['revengedb.migrations'] = $this->app->share(function ($app) {
            return new MigrationsCommand;
        });
        $this->commands('revengedb.migrations');

        $this->app['revengedb.models'] = $this->app->share(function ($app) {
            return new ModelsCommand;
        });
        $this->commands('revengedb.models');

        $this->app['revengedb.seeds'] = $this->app->share(function ($app) {
            return new SeedsCommand;
        });
        $this->commands('revengedb.seeds');

        $this->app['revengedb'] = $this->app->share(function ($app) {
            return new RevengeDbCommand;
        });
        $this->commands('revengedb');
    }

    public function boot()
    {
        $this->app->register(GeneratorsServiceProvider::class);
    }
}
