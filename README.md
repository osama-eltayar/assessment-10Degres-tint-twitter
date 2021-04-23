# tiny Twitter 

>assessment backend task for 10Digress Company

**small laravel app acting as tiny twitter following repository service pattern and test cases

## Install instructions

1. git clone git@github.com:osama-eltayar/
1. in terminal `$ cd /Products_crud`
1. in terminal  `$ composer install`
1. in terminal `$ npm install`
1. in terminal  `$ cp .env.example .env`
1. in terminal `$ php artisan key:generate`
1. configure your database in .env file
1. configure your email provider in .env file
1. in terminal  `$ npm run dev`
1. in terminal  `$ php artisan storage:link`
1. in terminal  `$ php artisan migrate --seed`
1. in terminal  `$ php artisan serve`
1. in terminal  `$ php artisan websocket:serve`

<hr>

>guest user can view products only admin can crud
**by default you have admin account**
email : superadmin@gmail.com
password : 12345678

<hr>

>application by default use sync queue if you want use database queue to send notification in back-ground follow this

1. change QUEUE_CONNECTION=sync to QUEUE_CONNECTION=database in .env file
1. in terminal `$ php artisan queue:work`

<hr>

>websockets by default use 6001 port if you want to change it define yours in .env file
