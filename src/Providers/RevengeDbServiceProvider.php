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
    }

    public function boot()
    {
        $this->app->register(GeneratorsServiceProvider::class);
    }
}
