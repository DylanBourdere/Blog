<?php
use Core\Auth\DBAuth;
define ('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home';
}

//Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if($page === 'home'){
    require ROOT . '/pages/admin/posts/index.php';
}elseif($page === 'posts.edit'){
    require ROOT . '/pages/admin/posts/edit.php';
}elseif($page === 'posts.add'){
    require ROOT . '/pages/admin/posts/add.php';
}elseif($page === 'posts.delete'){
    require ROOT . '/pages/admin/posts/delete.php';
}elseif($page === 'category'){
    require ROOT . '/pages/admin/category/index.php';
}elseif($page === 'category.delete'){
    require ROOT . '/pages/admin/category/delete.php';
}elseif($page === 'category.add'){
    require ROOT . '/pages/admin/category/add.php';
}elseif($page === 'category.edit'){
    require ROOT . '/pages/admin/category/edit.php';
}
$content = ob_get_clean();
require ROOT . '/pages/templates/default.php';
