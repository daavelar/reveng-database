<?php namespace Daavelar\RevengeDb\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Migrations extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'revengedb:migrations';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create migrations files based on the mysql schema.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$this->info('fire in the hole!');
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
		];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
		];
	}

}
