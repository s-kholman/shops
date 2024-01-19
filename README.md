git clone https://github.com/s-kholman/shops.git

composer install

Добавить данные в
.ENV
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=

php artisan migrate

php artisan key:generate

php artisan db:seed

php artisan serve
