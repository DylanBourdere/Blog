<?php
namespace App\Table;

use App\App;

class Article
{

    public static function getLast()
    {
        return App::getDb()->query("
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles
            LEFT JOIN categories
                ON categories_id = categories.id"
        , __CLASS__);
    }

    /**
     * __get
     * @param mixed $key 
     * @return mixed 
     */
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    /**
     * getUrl
     * @return mixed 
     */
    public function getUrl()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    /**
     * getExtrait
     * @return mixed 
     */
    public function getExtrait()
    {
        $html = '<p>'. substr($this->contenu, 0, 100) .'...</p>';
        $html .= '<p><a href="'. $this->getURL() .'">Voir la suite</a></p>';
        return $html;
    }

}