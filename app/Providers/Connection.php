<?php
namespace App\Providers;

use PDO;

class Connection{
    private $host = 'localhost';
    private $db   = 'php_project';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8mb4';
    private $pdo;

    public function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        return $this->pdo;
    }

    // در این قسمت در اصل اتصال 
    // برقرار شده است
    public function getmyDB()
    {
    if ($this->pdo instanceof PDO)
        {
        return $this->pdo;
        }
    }
}