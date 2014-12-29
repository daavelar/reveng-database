# RevengeDb

With this package you will be able to run the following commands:

- `revengedb` #run all of revenge commands
<!-- -`revengedb:migrations` -->
- `revengedb:seeds`
- `revengedb:models`

Add this to your composer require-dev section:

    "daavelar/revenge-db": "~1.2"
    
Run:   
 
    composer update --dev

Put the ServiceProviders in the app.php

    'Way\Generators\GeneratorsServiceProvider',
<!-- 'Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider', -->
    'Daavelar\RevengeDb\RevengeDbServiceProvider'
    
Adjust your database config in database.php

    return [
        'connections' => [
             'mysql' => [
                'driver'    => 'some data here',
                'host'      => 'some data here',
                'database'  => 'some data here',
                'username'  => 'some data here',
                'password'  => 'some data here',
                'charset'   => 'some data here',
                'collation' => 'some data here',
                'prefix'    => 'some data here'
            ],
        ]
    ];
        
##Executing actions: 

<!-- Generating a migration file for all tables of the database -->
    
<!-- php artisan revengedb:migrations -->
    
Generating a seed file for all tables of the database
    
    php artisan revengedb:seeds
    
Generating a model for all tables of the database    
    
    php artisan revengedb:models
    
If you want just execute the action in one or more tables, you can pass only as a parameter
    
<!-- php artisan revengedb:migrations --only=table1,table2,table3 -->
    php artisan revengedb:seeds --only=table1,table2,table3
    php artisan revengedb:models --only=table1,table2,table3    
    
If you want just exclude one or more tables, you can pass the except parameter
    
<!-- php artisan revengedb:migrations --except=table1,table2,table3 -->
    php artisan revengedb:seeds --except=table1,table2,table3
    php artisan revengedb:models--except=table1,table2,table3
    
