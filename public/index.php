<?php
define ('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();
$app = App::getInstance();


ob_start();
$router = new Core\Router\Router($_GET['url']);
$router->get('/', function(){require ROOT . '/pages/posts/home.php';});
$router->get('/home', function(){require ROOT . '/pages/posts/home.php';});
$router->get('/posts/category/:id', function($id){
    $app = App::getInstance();
    $app->setRouteId($id);
    require ROOT . '/pages/posts/category.php';
});
$router->get('/posts/show/:id', function($id){
    $app = App::getInstance();
    $app->setRouteId($id);
    require ROOT . '/pages/posts/show.php';
});
$router->run();
$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';
