# SD-Blog-Laravel
##Silicon Dreams Blog

A weboldal adatbázisként egy SQLite adatbázis lett létrehozva, ami megtalálható a projekt 'database/' mappájában 'database.sqlite' néven.
Az adatbázis fel lett töltve minta adatokkal is.

Fejlesztés során a 'php artisan serve' által indított szervert használtam.

A '.env' fájlt létrehozni a '.env.example' fájlból lehet másolás és átnevezéssel.
Az SQLite adatbázis beállításához csupán a következő sornak kell szerepelnie: 'DB_CONNECTION=sqlite' a '.env' fájlban.
A következő sorok törlésre kerülhetnek:
```
DB_CONNECTION=mysql 
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_app
DB_USERNAME=root
DB_PASSWORD=
```
Futtatási követelmények:
1) megfelelő PHP verzió 
2) Composer

Repo klónozása és beüzemelés fejlesztői környezet termináljából:
```
git clone https://github.com/Mily13/SD-Blog-Laravel.git
cd DS-Blog-Laravel
cd blog-app
composer install
php artisan key:generate
php artisan serve
```
Saját számítógépemen a fentebb leírt utasításokkal működik a weboldal (és DB). 

