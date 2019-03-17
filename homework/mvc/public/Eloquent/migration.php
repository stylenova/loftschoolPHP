<?php

require __DIR__ . '/../../vendor/autoload.php';
require_once "../../app/Core/Bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->string('name');
    $table->string('password');
    $table->integer('age');
    $table->text('info')->nullable();
    $table->text('photo');
    $table->boolean('admin')->default(0);
    $table->timestamps();
});
Capsule::schema()->dropIfExists('files');
Capsule::schema()->create('files', function ($table) {
    $table->increments('id');
    $table->text('name');
    $table->integer('user_id');
    $table->timestamps();
});