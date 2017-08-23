<?php
namespace App\Controller\Admin;
use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $categories = $this->Category->all();
        $this->render('admin.category.index', compact('categories'));
    }

    public function add(){
        if(!empty($_POST)){
            $result = $this->Category->create([
                'titre' => $_POST['titre']
            ]);
            if($result){
                header('Location: index.php?p=admin.categories.index');
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.category.edit', compact('form'));
    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre']
            ]);
            if($result){
                header('Location: index.php?p=admin.categories.index');
            }
        }
        $categories = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($categories);
        $this->render('admin.category.edit', compact('form'));
    }

    public function delete(){
        if(!empty($_POST)){
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}