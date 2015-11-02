<?php namespace Daavelar\RevengeDb\Commands;

use Daavelar\RevengeDb\Abstracts\DatabaseCommand;
use Symfony\Component\Console\Input\InputArgument;

class MigrationsCommand extends DatabaseCommand {

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
    protected $description = 'Generates a migration file from the tables of the database.';

    /**
     * Create a new command instance.
     *
     * @return \MigrationFromDb
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
       dd($this->tables());
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


}
