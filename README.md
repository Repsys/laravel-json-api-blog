## Laravel {JSON:API} Blog

### Описание:
Блог на основе [laravel-json-api](https://github.com/laravel-json-api/laravel), сделан по [гайду](https://laraveljsonapi.io/docs/3.0/tutorial/)

### Как запустить:

1. Клонировать проект:
    ```
    git clone https://github.com/Repsys/laravel-json-api-blog
    ```
2. Выполнить в корне проекта:
    ```
    cp .env.example .env
    composer i
    docker-compose up -d
    sudo chmod 777 -R ./storage/
    docker-compose exec php-fpm php artisan key:generate
    docker-compose exec php-fpm php artisan migrate
    ```
