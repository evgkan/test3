###Установка
0. Склонируйте репозиторий git clone ...
0. Установите пакеты composer install
0. Создайте БД и забейте настройки в желаемое окружение
0. Выполните инициализацию проекта php init с выбранным окружением
0. Выполните миграции php yii migrate
0. Настройте сервер на backend и frontend: /frontend/web и /backend/web

###Комментарии
0. Дефолтный админ создается в миграциях: admin/admin
0. При изменении названия товара slug остается прежним: желательно для SEO.
0. Привязка товара к модификациям реализована в виде "один ко многим". Возможно, имелось в виду "многие ко многоим". Из задания не очень понятно.
0. Русификацию/др.украшательства особо не делал - думаю, ни к чему. 