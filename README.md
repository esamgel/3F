# My3F
My Family and Friends Finance app - focus on small credit union group (less than 100 members)

Requirement
- php 7
- laravel 5.4 frame work with all dependencies
- sqlite
- bootstap

How to run

1. install composer
```bash
composer install 
```
2. setup your enviroment
 ```bash
cp .env.example .env
```
3. Generate an app encryption key
 ```php
php artisan key:generate
```
4. Create an empty database (e.g local dev: recommend db.sqlite, on Production: postgres)
5. In the .env file, add database information
6. Migrate the database
 ```php
php artisan migrate 
```
7. Start php serve
 ```php
php artisan serve 
```
