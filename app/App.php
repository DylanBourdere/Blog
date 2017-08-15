<?php
namespace App; 
class App{

    public $title = "Blog";
    private static $_instance;

    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

}