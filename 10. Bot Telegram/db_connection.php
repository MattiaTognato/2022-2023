<?php

require_once 'vendor/autoload.php';

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