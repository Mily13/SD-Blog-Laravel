# SD-Blog-Laravel
Silicon Dreams Blog

A weboldal adatbázisként egy SQLite adatbázis lett létrehozva, ami megtalálható a projekt 'database/' mappájában 'database.sqlite' néven.
Az adatbázis fel lett töltve minta adatokkal is.

Fejlesztés során a 'php artisan serve' által indított szervert használtam.

A '.env' fájlt létrehozni a '.env.example' fájlból lehet másolás átnevezéssel.
Az SQLite adatbázis beállításához csupán a következő sornak kell szerepelnie: 'DB_CONNECTION=sqlite' a '.env' fájlban.

Futtatási követelmények:
1) megfelelő PHP verzió 
2) Composer

Repo klónozása:
```bash
git clone https://github.com/Mily13/SD-Blog-Laravel.git
cd DS-Blog-Laravel


