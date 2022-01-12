<?php
namespace App\Providers;
// require_once __DIR__. "/../../database/config.php";
class Connection {
    public function __construct()
    {
        $dbname = $_ENV['DB_NAME'];
        $host = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];
        try {
            $pdo = new \PDO("mysql:host=$host;dbname=$dbname",  $username, $password);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $pdo;
    }
}