# Laravel 5.1 Package :: RevengeDb

With this package you will be able to transform your existent mysql schema in migration files of Laravel
with the following commands:

- `php artisan revengedb:migrations`
- `php artisan revengedb:seeds`
- `php artisan revengedb:models`

You have the option to run all commands above in one line:

- `php artisan revengedb`

# Installation

Add the package to your Laravel project:

    composer require daavelar/revengedb --dev

Add the ServiceProvider to the app.php file

    Daavelar\RevengeDb\RevengeDbServiceProvider::class
    
# Using: 

Generating a migration file for all tables of the database
    
    php artisan revengedb:migrations
    
Generating a seed file for all tables of the database
    
    php artisan revengedb:seeds
    
Generating a model for all tables of the database    
    
    php artisan revengedb:models
    
If you want just execute the action in one or more tables, you can pass only as a parameter
    
    php artisan revengedb:migrations --only=table1,table2,table3
    php artisan revengedb:seeds --only=table1,table2,table3
    php artisan revengedb:models --only=table1,table2,table3    
    
If you want just exclude one or more tables, you can pass the except parameter
    
    php artisan revengedb:migrations --except=table1,table2,table3
    php artisan revengedb:seeds --except=table1,table2,table3
    php artisan revengedb:models--except=table1,table2,table3
    
