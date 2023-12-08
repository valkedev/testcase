# Тестовое задание по Laravel

## Установка
```cp .env.example .env```

Затем настройте параметры в `.env` файле.

```
composer install
php artisan key:generate
php artisan storage:link
```

Запуск миграции (используйте опцию `--seed` для заполнения базы тестовыми данными):
```
php artisan migrate
```

Установите пакеты для фронтэнда и сделайте сборку (пример для yarn):

```
yarn
yarn build
```

## Запуск

Для запуска сервера выполните команду:

```php artisan serve```

Для запуска сборки ресурсов в режиме разработки выполните команду (пример для yarn):

```yarn dev```
