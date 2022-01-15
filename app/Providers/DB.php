<?php
namespace App\Providers;

class DB {

    private static $db;
    private static $table;

    public function __construct()
    {
        self::$db = new QueryBuilder();
        self::$db = $this->pdo->getmyDB();
    }

    public static function table($table)
    {
        self::$table = $table;
        return self::$table;
    }

    public static function select($datas = array())
    {
        $table = self::$table;
        $stmt = self::$db->query("SELECT * FROM {$table}")->fetch();
        return $stmt;
    }
}