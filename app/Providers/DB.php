<?php
namespace App\Providers;

/**
 * بوسیله تکه تکه کردن کد ها میتوان یک
 * متد زنجیره حرفه ای ساخت
 */
class DB {

    private $pdo;
    // در این روش میتوان برای هر متد یک 
    // پراپرتی هم نام داشت
    private $select;
    private $where;
    private $whereAnd;
    private $whereOr;
    //
    private $query;

    public function __construct()
    {
        $this->pdo = new Connection();
        $this->pdo = $this->pdo->getmyDB();
    }

    public function select($table, $fields = array('*'))
    {
        $this->select = $this->pdo->query("SELECT {$fields} FROM {$table}");
        return $this;
    }

    public function where($key, $value)
    {
        // var_dump($this->query);
        // json_encode()
        // die();
        // 
        // Object of class PDOStatement could not be converted to string
        // var_dump($this->query);
        // die();
        $this->where .= " WHERE $key = $value " ;
        // var_dump($this->query);
        // die();
        // $this->query->execute([$key => $value]);
        // $this->query = $this->query->fetchAll();
        return $this;
    }
    
    public function get()
    {
        //https://programmingdive.com/how-to-use-method-chaining-in-php/
        $this->query = $this->select;
        $this->query .= $this->where;
        var_dump($this->query);
        die();
        // $query = $query->fetch();
        
        return $this->query;
    }
}