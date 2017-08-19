<?php
namespace App\Table;
use Core\Table\Table;

class PostTable extends Table {

    protected $table = 'articles';

    /**
     * Récupere les derniers articles
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categories_id = categories.id
            ORDER BY articles.date DESC
        ");
    }

    /**
     * Récupere les derniers articles de la catégorie demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categories_id = categories.id
            WHERE articles.categories_id = ?
            ORDER BY articles.date DESC
        ", [$category_id]);
    }

    /**
     * Récupere un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function find($id){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON categories_id = categories.id
            WHERE articles.id = ?
        ", [$id], true);
    }

}