<?php
namespace App\Providers;
require_once __DIR__ . '/../../database/config.php';

class QueryBuilder{
    public function selectAll($table)
    {
        require_once __DIR__ . '/../../database/config.php';
        $stmt = $pdo->query('SELECT * FROM users WHERE id=2')->fetch();
        echo $stmt['username'];
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}