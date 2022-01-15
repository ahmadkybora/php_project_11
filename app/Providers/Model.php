<?php
namespace App\Providers;

use App\Providers\Connection;
use App\Providers\QueryBuilder;

class Model{

    /**
     * این پراپرتی برای نام گذاری جدول میباشد
     */
    protected $table;
    private $db;

    public function __construct($table)
    {
        // $this->pdo = new Connection();
        // $this->pdo = $this->pdo->getmyDB();
        // $this->table;
        $this->db = new QueryBuilder();
        $this->table = $table;
        $this->setTable($table);
    }

    /**
     * جدول مورد نظر را 
     * اینجا ست میکنیم
     */
    public function setTable($table)
    {
        return $this->table = $table;
    }

    // public function getTable()
    // {

    // }
    public function all()
    {
        return $this->db->selectAll($this->table);
    }
    
    public function find($id)
    {
        return $this->db->findById($this->table, $id);
    }

    // public function create($datas = array())
    // {
    //     $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (first_name, last_name, username) VALUES (:first_name, :last_name, :username)");
    //         $stmt->execute([
    //             ':first_name' => $datas['first_name'], 
    //             ':last_name' => $datas['last_name'], 
    //             ':username' => $datas['username']
    //         ]);
    // }

    // public function save()
    // {
    //     $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (first_name, last_name, username) VALUES (:first_name, :last_name, :username)");
    //     $stmt->execute([
    //         ':first_name' => $this->first_name, 
    //         ':last_name' => $this->last_name, 
    //         ':username' => $this->username
    //     ]);
    // }
}