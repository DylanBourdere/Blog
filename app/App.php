<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App{

    public $title = "Blog";
    private $db_instance;
    public $routeId;

    private static $_instance;


    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function setRouteId($id){
        $this->routeId = $id;
    }

    public function getRouteId(){
        return $this->routeId[0];
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name){
        $class_name = 'App\\Table\\' . ucfirst($name) . 'Table' ;
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if($this->db_instance === null){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}