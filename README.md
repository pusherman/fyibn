fyibn
=========
A very simple (and fast) PHP forum

Requirements
-----------

A few requirements must be met before installing:

* PHP 5.4 or greater with php-mcrypt
* MySQL or MariaDB
* Composer

Installation
--------------

```sh
$ git clone https://github.com/pusherman/fyibn.git fyibn
$ cd fyibn
```

Create database as defined in [app/config/database.php](app/config/database.php)

```sh
$ composer install
$ php artisan migrate
```
