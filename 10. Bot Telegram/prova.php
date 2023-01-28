<?php

require_once 'vendor/autoload.php';
require_once __DIR__ . '/Favourites.php';

use Illuminate\Database\Capsule\Manager;

$capsule = new Manager();

$capsule->addConnection([

    'driver'   => 'mysql',

    'host'     => 'localhost',

    'database' => 'tg_bot',

    'username' => 'root',

    'password' => '',

    'charset'   => 'utf8',

    'collation' => 'utf8_unicode_ci',

    'prefix'   => '',

]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

$fav = new Favourites();
$fav->user_id = 1;
$fav->drink_id = 1;
$fav->save();