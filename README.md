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
