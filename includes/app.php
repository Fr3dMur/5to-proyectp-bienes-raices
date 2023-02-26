<?php 

require 'funciones.php';
require 'templates/config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Connect with Database
$db = conectarDB();
$db->set_charset('utf8');

use App\ActiveRecord;

$active = new ActiveRecord();

$active::setDB($db);

// var_dump($propiedad);
