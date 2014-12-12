<?php namespace Daavelar\RevengeDb\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class RevengeDbCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'revengedb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create migrations, seeds and models based on the database tables.';

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
        if(is_null($this->option('migrations')) && is_null($this->option('seeds')) && is_null($this->option('models'))) {
            $this->call('revengedb:migrations');
            $this->call('revengedb:seeds');
            $this->call('revengedb:models');
        }
        else {
            if($this->option('migrations')) {
                $this->call('revengedb:migrations');
            }
            if($this->option('seeds')) {
                $this->call('revengedb:seeds');
            }
            if($this->option('models')) {
                $this->call('revengedb:models');
            }
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

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['migrations', null, InputOption::VALUE_OPTIONAL, 'Create the migrations.', true],
            ['seeds', null, InputOption::VALUE_OPTIONAL, 'Create the seeds.', true],
            ['models', null, InputOption::VALUE_OPTIONAL, 'Create the models.', true]
        ];
    }

}
