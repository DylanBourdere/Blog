<?php

require '../app/Autoloader.php';
App\Autoloader::register();

$app = App\App::getInstance();

$post = $app->getTable('Posts');
