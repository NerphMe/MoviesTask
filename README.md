# MoviesTask

Важно! Актуально только для Linux/MacOS


Сколнировать репозиторий в локальную папку. 


Установить Mysql и создать там юзера с логином и паролем root vetal123 и названием базы new и таблоцей csv. Ниже приведем код для генерирования схемы и таблицы.
create schema new;
CREATE TABLE Movies (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
movie_name VARCHAR(200),
release_date VARCHAR(30),
format VARCHAR(50),
actors VARCHAR(200)

Запустить встроеный веб-сервер в локальной папке (php -S localhost:8000)

И открыть http://127.0.0.1:8000/DB.php - для создания таблицы в бд.


Перейти на hhttp://127.0.0.1:8000/ShowMovies.php и загрузить файл с папки проэкта.
