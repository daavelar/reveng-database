# Laravel 5.1 Package :: RevengeDb

With this package you will be able to transform your existent schema (only support mysql at the moment) in migration files of Laravel
with the following command:

- `php artisan revengedb:migrations`

# Installation

Add the package to your Laravel project:

    composer require daavelar/revengedb

Add the ServiceProvider to the app.php file

    Daavelar\RevengeDb\Providers\RevengeDbServiceProvider::class

# Using: 

Generating a migration file for all tables of the database of your mysql config
    
    php artisan revengedb:migrations
    
If you want just execute the action in one or more tables, you can pass only as a parameter
    
    php artisan revengedb:migrations --only=table1,table2,table3

If you want just exclude one or more tables, you can pass the except parameter
    
    php artisan revengedb:migrations --except=table1,table2,table3
    
Important: 
All migration files will be generated with the $table->timestamps() line.

