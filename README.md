## How to setup the project
### 1. Install the composer 
 Here -> https://getcomposer.org/download/
### 2. Install php 8.2
 Here -> https://windows.php.net/download#php-8.3
### 2.1 Add the php to the system path
    Add the php to the system path (you need to have access to the php.exe from the cmd)
### 2.2 Configure php.ini to use the composer
    Change the php.ini-development to php.ini
    Uncomment this lines:
    extension_dir = "ext"
    extension=curl
    extension=fileinfo
    extension=gd
    extension=intl
    extension=openssl
    extension=pdo_sqlite
    extension=zip
### 3. Open the cmd and go to the project folder
### 4. Run the command: 
composer install
### 5. Run the command: 
composer update
### 6. Copy the 
.env.example to .env
### 7. Seed the database with the command:
 php artisan migrate:fresh --seed
### 8. To start the server use the command: 
php artisan serve --port=4433 or go to public folder and run the command: php -S localhost:4433

## Structure of the project
In \routes\web.php you can find the routes of the project there you will find the routes for the pages and the links to the controllers.
In \app\Http\Controllers you can find the controllers of the project that are responsible for the logic of the project.
In \app\Models you can find the models of the project (the models are the tables of the database).
In \resources\views you can find the views of the project (the views are the pages of the project, the html with blade).
Views with _ are the partials of the project (the partials are the html that is used in more than one page) and this views are not loaded directly.
IN \database\migrations you can find the migrations of the project (the migrations are the files that create the tables of the database).
In \database\seeders you can find the seeders of the project (the seeders are the files that populate the tables of the database).

## Views
# @extends(_show) 
    This is used to load default html for the pages. (Navbar, footer, etc)
# @section('content')
    This is used to send the content to the default html. (_show)
# {{ $variable }}
    This is used to print the variable in the html. from the controller to the view.
#  {{ route('route_name') }}
    This is used to print the route in the html. from the controller to the view.

## When creating new model, controller, migration, seeder we use the command: 
php artisan make:model ModelName -a
    -a is used to create the model, controller, migration, seeder at once.
## When creating new controller we use the command: 
 php artisan make:controller ControllerName
## When creating new migration we use the command: 
 php artisan make:migration migration_name
## When creating new seeder we use the command:
 php artisan make:seeder seeder_name
## When creating new model we use the command:
 php artisan make:model model_name
