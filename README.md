## Концепция
Helpdesk для службы поддержки.

Реализовано:
- пользователи оставляют заявки(тикеты)

В планах:
- статусы заявок
- старшие менеджеры распределяют заявки по менеджерам
- модераторы могут создавать аккаунты менеджеров и старших менеджеров
- суперадмин - полный доступ (создание и редактирование заявок и пользователей)


## Установка и настройка приложения

- Клонировать репозиторий
- Переключиться на ветку dev
- Переименовать файл /.env.example в .env
- Выполнить из корня проекта: 
  - docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
  - ./vendor/bin/sail up -d
  - ./vendor/bin/sail artisan key:generate
  - ./vendor/bin/sail artisan migrate --seed
- Открыть документацию на странице http://127.0.0.1/docs.html
