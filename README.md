###Установка

0. Склонируйте репозиторий git clone https://github.com/evgkan/test3.git ...
0. Установите пакеты composer install
0. Создайте БД и забейте настройки в желаемое окружение
0. Выполните инициализацию проекта php init с выбранным окружением
0. Выполните миграции php yii migrate
0. Настройте сервер на backend и frontend: /frontend/web и /backend/web

Пример для nginx|фронт:


    ...
    server_name front.test;
    root /var/www/frontend/web;
    index index.php index.html index.htm;
    
    location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }
    ...

###Комментарии

0. Используемые версии: php 7.3, mysql 8.0
0. Дефолтный админ создается в миграциях: admin/admin
0. При изменении названия товара slug остается прежним: желательно для SEO.
0. Привязка товара к модификациям реализована в виде "один ко многим". Возможно, имелось в виду "многие ко многоим". Из задания не очень понятно.
0. Украшательства особо не делал - думаю, ни к чему. 