<?php
require_once __DIR__ . "/../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../../.env');
$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" => $_ENV['DB_HOST'],
    "database" => $_ENV['DB_NAME'],
    "username" => $_ENV['DB_USERNAME'],
    "password" => $_ENV['DB_PASSWORD'],
    "charset" => "utf8",
    "collation" => "utf8_unicode_ci",
    "prefix" => "",
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();