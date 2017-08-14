<?php
namespace App;
use \PDO;
/**
 * Class Database
 * @package App
 */
class Database
{
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /**
     * Construct
     *
     * @param string $db_name
     * @param string $db_user
     * @param string $db_pass
     * @param string $db_host
     */
    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * Create a PDO connection if doesnt exist
     *
     * @return PDO
     */
    private function getPDO()
    {
        if($this->pdo === null){
        $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($stmt, $class_name)
    {
        $req = $this->getPDO()->query($stmt);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }

    
    public function prepare($stmt, $attr, $class_name, $one = false)
    {
        $req = $this->getPDO()->prepare($stmt);
        $req->execute($attr);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one)
        {
            $datas = $req->fetch();
        }
        else
        {
            $datas = $req->fetchAll();
        }
        return $datas;
    }
}
