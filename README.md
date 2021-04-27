# Simple register and login example with PHP 7.4 and PDO

## Running the code

If you use XAMPP, MAMP, Laragon, or similar, you can do it as usual.

If not, you can use the built-in PHP server with `php -S localhost:8000`

## Selecting the database

The database code is made in a way that makes using both a MySQL database
and the file-based SQLite database possible.

### If using MySQL

1. Edit `dbdata.ini` and insert your database credentials
2. Go to `/init.php` in the browser to initialize the database

### If using SQLite

1. Change the value in line 6 in `db.php` from `false` to `true`
2. Go to `/init.php` in the browser to initialize the database

