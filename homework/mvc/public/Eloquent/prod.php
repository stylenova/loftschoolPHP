<?php

require __DIR__ . '/../../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    "driver" => "mysql",
    "host" => "localhost",
    "database" => "mvc",
    "username" => "root",
    "password" => "",
    "charset" => "utf8",
    "collation" => "utf8_unicode_ci",
    "prefix" => "",
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

Capsule::schema()->dropIfExists('prod');

Capsule::schema()->create('prod', function ($table) {
    $table->increments('id');
    $table->string('title');
    $table->integer('price');
    $table->integer('color');
    $table->integer('size');
    $table->text('photo');
    $table->text('info')->nullable();
    $table->timestamps();
});
Capsule::schema()->dropIfExists('category');
Capsule::schema()->create('category', function ($table) {
    $table->increments('id');
    $table->integer('category');
    $table->integer('prod_id');
    $table->timestamps();
});