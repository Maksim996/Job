- добавлены миграции для таблиц базы данных
Установка проекта в первый раз

   
    Зайти в папку
            open server -> C:\ Open Server\OSPanel\domains
                laragon -> C:\Laragon
    Правой кнопкой вызвать git bush 
            Ввести команду git clone https://github.com/Maksim996/Job.git
    Перейти в папку с проект "job" найти файл .env.example создать копию его с названием .env 
            (проверить настройки подключения базы данных)
                DB_CONNECTION=mysql
                DB_HOST=127.0.0.1
                DB_PORT=3306
                DB_DATABASE=job_db
                DB_USERNAME=root
                DB_PASSWORD=
      Открыть консоль Open Server (Laragon)      
      Ввести команды поочерёдно    
                composer install 
                php artisan key:generate
      
      Для тестировки: скачать файлик с телеграмма job_ssu.sql 
                      создать в  phpMyAdmin базу (имя базы должно соответствовать с настройкам в .env)
                      импортировать файл в созданную базу данных

      Запустить OpenServer или Laragon
   
   
   Настройки сервера             
	Open Server
   php - 7.2  win 64
   apache 2.4 win 64
   Зайти в настройки во вкладку "домены" 
                    - Селект управление доменами : Ручное управление
                    - Имя домена : (любое как удобно default: job.test)
                    - Папка домена : "папка с проэктом"/public
                Нажать кнопку "Добавить" -> сохранить
