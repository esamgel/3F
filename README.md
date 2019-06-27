# 3F
Family and Friends Finance app - focus on small credit union group (less than 100 member)

Requirement
- php 7
- laravel 5.4 frame work with all dependencies
- sqlite
- bootstap

How to run

1. install composer
 -  composer install 
2. setup your enviroment
 - cp .env.example .env
3. Generate an app encryption key
 - php artisan key:generate
4. Create an empty database(e.g db.sqlite)
5. In the .env file, add database information
6. Migrate the database
 - php artisan migrate
7. Start php serve
 - php artisan serve
