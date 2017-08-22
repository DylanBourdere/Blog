<?php
namespace Core\Database;
use \PDO;
/**
 * Class MysqlDatabase
 * @package App
 */
class MysqlDatabase extends Database
{
    
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO()
    {
        if($this->pdo === null){
        $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($stmt, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($stmt);
        if(
            strpos($stmt, 'UPDATE') === 0 ||
            strpos($stmt, 'INSERT') === 0 ||
            strpos($stmt, 'DELETE') === 0
        ){
            return $req;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
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

    
    public function prepare($stmt, $attr, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->prepare($stmt);
        $res = $req->execute($attr);
        if(
            strpos($stmt, 'UPDATE') === 0 ||
            strpos($stmt, 'INSERT') === 0 ||
            strpos($stmt, 'DELETE') === 0
        ){
            return $res;
        }
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
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
