<?php
namespace App; 
class App{

    public $title = "Blog";
    private $db_instance;

    private static $_instance;


    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public function getTable($name){
        $class_name = 'App\\Table\\' . ucfirst($name) . 'Table' ;
        return new $class_name($this->getDb());
    }

    public function getDb(){
        $config = Config::getInstance();
        if($this->db_instance === null){
            $this->db_instance = new Database\MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}