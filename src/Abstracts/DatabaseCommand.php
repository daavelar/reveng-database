<?php namespace Daavelar\RevengeDb\Abstracts;

use Daavelar\RevengeDb\Traits\OnlyAndExceptArguments;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputOption;

abstract class DatabaseCommand extends Command
{

    use OnlyAndExceptArguments;

    public function __construct()
    {
        $config = new \Doctrine\DBAL\Configuration();

        $connectionParams = [
            'dbname'   => config('database.connections.mysql.database'),
            'user'     => config('database.connections.mysql.username'),
            'password' => config('database.connections.mysql.password'),
            'host'     => config('database.connections.mysql.host'),
            'driver'   => 'pdo_mysql',
        ];

        $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

        $conn->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
        $this->schema = $conn->getSchemaManager();

        parent::__construct();
    }

    /**
     * @return mixed
     */
    protected function tables()
    {
        if($this->passedOnlyAndExcept()) {
            $this->error('You can`t set the only and the except param at the same time.');
            exit;
        }

        $tables = $this->schema->listTables();

        $tables_to_return = [];

        if($this->passedOnly()) {
            foreach($tables as $table) {
                if(in_array($table->getName(), $this->commaParse($this->option('only')))) {
                    $tables_to_return[] = $table;
                }
            }
        }

        if($this->passedExcept()) {
            foreach($tables as $table) {
                if(!in_array($table->getName(), $this->commaParse($this->option('only')))) {
                    $tables_to_return[] = $table;
                }
            }
        }

        if(!$this->passedExcept() && !$this->passedOnly()) {
            foreach($tables as $table) {
                $tables_to_return[] = $table;
            }
        }

        return $tables_to_return;
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['only', null, InputOption::VALUE_OPTIONAL, 'The tables to make the action.', null],
            ['except', null, InputOption::VALUE_OPTIONAL, 'The tables to not make the action.', null],
            ['filename', null, InputOption::VALUE_OPTIONAL, 'The name of the file.', null],
        ];
    }
}
