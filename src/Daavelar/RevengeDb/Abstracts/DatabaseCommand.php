<?php namespace Daavelar\RevengeDb\Abstracts;

use Daavelar\RevengeDb\Traits\OnlyAndExceptArguments;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\InputOption;

abstract class DatabaseCommand extends Command {

    use OnlyAndExceptArguments;

    /**
     * @return mixed
     */
    protected function tables()
    {
        if($this->passedOnlyAndExcept()) {
            $this->error('You can`t set the only and the except param at the same time.');
            exit;
        }

        if($this->passedOnly()) {
            return $this->commaParse($this->option('only'));
        }

        $dbname = $this->database();
        $tables = DB::SELECT(DB::raw("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$dbname'"));

        if($this->passedExcept()) {
            foreach($tables as $table) {
                if(!in_array($table->TABLE_NAME, $this->commaParse($this->option('except')))) {
                    $tables_return[] = $table->TABLE_NAME;
                }
            }
            return $tables_return;
        }
        else {
            foreach($tables as $table) {
                $tables_return[] = $table->TABLE_NAME;
            }
        }

        return $tables_return;
    }

    /**
     * @return mixed
     */
    protected function database()
    {
        $driver = $this->laravel->config->get('database.default');
        $dbname = $this->laravel->config->get("database.connections.$driver.database");

        return $dbname;
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

    function toCamelCase($string)
    {
        $pieces = explode('_', $string);

        $camelCasedWord = '';

        foreach($pieces as $piece) {
            $camelCasedWord .= ucfirst($piece);
        }

        return $camelCasedWord;
    }


} 