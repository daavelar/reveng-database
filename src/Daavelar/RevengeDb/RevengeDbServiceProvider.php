<?php namespace Daavelar\RevengeDb;

use Barryvdh\MigrationGenerator\MigrationGeneratorServiceProvider;
use Daavelar\RevengeDb\Commands\MigrationsCommand;
use Daavelar\RevengeDb\Commands\ModelsCommand;
use Daavelar\RevengeDb\Commands\RevengeDbCommand;
use Daavelar\RevengeDb\Commands\SeedsCommand;
use Illuminate\Support\ServiceProvider;

class RevengeDbServiceProvider extends ServiceProvider {

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
			return new MigrationsCommand();
		}); $this->commands('revengedb.migrations');

		$this->app['revengedb.models'] = $this->app->share(function ($app) {
			return new ModelsCommand();
		}); $this->commands('revengedb.models');

		$this->app['revengedb.seeds'] = $this->app->share(function ($app) {
			return new SeedsCommand;
		}); $this->commands('revengedb.seeds');

		$this->app['revengedb'] = $this->app->share(function ($app) {
			return new RevengeDbCommand();
		}); $this->commands('revengedb');
	}

	public function boot()
	{
		$this->package('daavelar/revengedb');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public
	function provides()
	{
		return [];
	}

}
