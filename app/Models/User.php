<?php
namespace App\Models;

use App\Providers\Connection;

class User{
    
    public $pdo;
    private $table = 'users';

    function __construct()
    {
        $this->pdo = new Connection();
    }

    public function all()
    {
        $pdo = $this->pdo->connect();
        //  var_dump($pdo);
        // require_once __DIR__ . '../../../database/config.php';
        $stmt = $pdo->query("SELECT * FROM {$this->table}");
var_dump($stmt);
        // while ($row = $stmt->fetch())
        // {
        //     echo $row['username'] . "\n";
        // }
    }
}