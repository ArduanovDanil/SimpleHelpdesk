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
- Выполнить composer install
- Запустить приложение через Sail (Docker) с помощью команды ./vendor/bin/sail up -d
- Открыть документацию на странице http://127.0.0.1/docs.html
