<?php namespace Daavelar\RevengeDb\Console;

use Daavelar\RevengeDb\Abstracts\DatabaseCommand;
use Symfony\Component\Console\Input\InputArgument;

class MigrationsCommand extends DatabaseCommand
{

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
    protected $schema;

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
        foreach($this->tables() as $table) {
            if($table->getName() == 'migrations') continue;
            
            $columns = $this->schema->listTableColumns($table->getName());

            $argumentos = "";

            foreach($columns as $column) {
                if($column->getName() == 'id') continue;
                if(!in_array($column->getName(), ['created_at', 'updated_at'])) {
                    $argumentos .= $column->getName() . ':' . $this->doctrineTypeToGenerator($column->getType()) . ',';
                }
            }

            $argumentos = rtrim($argumentos, ',');

            $this->callSilent('make:migration:schema', [
                'name'     => "create_{$table->getName()}_table",
                '--schema' => $argumentos
                ]);

            $this->info("Creating migration file for table {$table->getName()}");
        }

    }

    public function doctrineTypeToGenerator($type)
    {
        $type = strtolower($type);

        switch($type) {
            case 'integer':
              return 'integer';
            case 'string':
            case 'simplearray':
                return 'string';
            case 'date':
                return 'date';
            case 'datetime':
                return 'datetime';
                case 'time':
                return 'time';
            case 'float': 
                return 'float';
            case 'text':    
            case 'blob':    
                return 'text';
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
