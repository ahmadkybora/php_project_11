<?php
namespace App\Http\Controllers;
require_once __DIR__ . '/../../../database/config.php';
use App\Providers\QueryBuilder;

class HomeController {
    public function index()
    {
        $table= "users";
        $pdo = require_once __DIR__ . '/../../../database/config.php';
        $sql = ("SELECT * FROM {$table}");
        $stmt = $pdo->query($sql);
        var_dump($stmt);
        // $stmt->execute();
        // return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}