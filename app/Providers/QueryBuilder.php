<?php
namespace App\Providers;
require_once __DIR__ . '/../../database/config.php';

class QueryBuilder{
    public function selectAll($table)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
}