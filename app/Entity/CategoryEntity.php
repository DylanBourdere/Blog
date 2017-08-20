<?php
namespace App\Entity;
use Core\Entity\Entity;

class CategoryEntity extends Entity {

    
    public function getUrl(){
        return '/posts/category/' . $this->id;
    }

}