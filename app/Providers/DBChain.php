<?php
namespace App\Providers;

/**
 * توجه کنید در متد زنجیره ای برای اتصال به دیتابیس
 * باید بصورت تکه تکه کد ها اجرا شود یعنی 
 * در هر متد یک قسمت از کویری انجام شده است
 */
class DBChain {

    private $db;
    private $select;
    private $where;
    private $whereAnd;
    private $whereOr;

    public function __construct()
    {
        $this->db = new QueryBuilder();
        $this->db = $this->pdo->getmyDB();
    }

    public function select($table, $fields)
    {
        $this->select = "SELECT $fields FROM $table";
        return $this;
    }

    public function where($condition, $eq)
    {
        $this->where .= " $condition=$eq " ;
        return $this;
        
    }

    public function whereAnd($condition, $eq)
    {
        $this->whereAnd .= " AND $condition=$eq " ;
        return $this;
        
    }

    public function whereOr($condition, $eq)
    {
        $this->whereOr .= " OR $condition=$eq " ;
        return $this;
        
    }

    public function show_query()
    {
        $where = ($this->where) ? " WHERE " : ' ';

        $query = $this->select;
        $query .= $where;
        $query .= $this->where;
        $query .= $this->where_and;
        $query .= $this->where_or;

        return $query;
    }
}

$db = new DBChain();        

echo $db->select('users as u', 'ali')
                    ->where('u.username', 'admin')
                    ->whereAnd('u.password', '123456')
                    ->whereAnd('u.isAdmin', true)
                    ->show_query();