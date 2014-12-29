<?php namespace Daavelar\RevengeDb\Commands;

use Daavelar\RevengeDb\Abstracts\DatabaseCommand;
use Symfony\Component\Console\Input\InputArgument;

class SeedsCommand extends DatabaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'revengedb:seeds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Seeds for the tables of the database.';

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
        foreach($this->tables() as $table) {
            if(is_null($this->option('filename'))) {
                $filename = $this->camelize($table);
            }
            else {
                $filename = $this->option('filename');
            }
            $this->call("generate:seed", ['tableName' => $filename]);
        }
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
