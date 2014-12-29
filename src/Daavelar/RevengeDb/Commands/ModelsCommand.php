<?php namespace Daavelar\RevengeDb\Commands;

use Daavelar\RevengeDb\Abstracts\DatabaseCommand;

class ModelsCommand extends DatabaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'revengedb:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the models based on the db schema.';

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
            $this->call('generate:model', ['modelName' => $this->toCamelCase($table)]);
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
