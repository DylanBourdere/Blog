<?php
namespace App\Controller;
use Core\Controller\Controller;
use \App;

class AppController extends Controller {

    public function __construct(){
        $this->viewPath = ROOT . '/app/Views/';
        $this->template = 'default';
    }

    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}