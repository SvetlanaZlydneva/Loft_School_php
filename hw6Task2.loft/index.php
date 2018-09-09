<?php
require_once 'vendor/autoload.php';
require_once 'config/Eloquent.php';

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->dropIfExists('category');
Capsule::schema()->create('category', function (Blueprint $table) {
    $table->increments('idCategory');
    $table->integer('parent')->default(0);
    $table->string('nameCategory');
});
Capsule::schema()->dropIfExists('product');
Capsule::schema()->create('product', function (Blueprint $table) {
    $table->increments('idProduct');
    $table->string('nameProduct');
    $table->integer('category');
    $table->double('price');
    $table->string('description');
});
