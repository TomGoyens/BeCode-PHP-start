<?php
define('ROOT', __DIR__);
define('ASSETS', ROOT.'/assets');
require ASSETS.'/php/Database.php';
$database = new Database;
$db = $database->connect("OOP_opdr");
// $database->initTable($db);
$user = new User($database);
$user->setUsername('tim');
$user->setEmail('tim@mail.com');
$user->setPassword('tim');
$user->register($db);
