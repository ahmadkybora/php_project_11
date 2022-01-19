<?php
namespace App\Providers;

/**
 * بوسیله تکه تکه کردن کد ها میتوان یک
 * متد زنجیره حرفه ای ساخت
 */
class DB2 {

    private $pdo;

    private $select;
    private $table;
    private $where = [];
    private $orWhere = [];
    private $whereIn = [];
    private $limit;

    private $query;

    public function __construct()
    {
        // var_dump($this->where);
        // die();
        $this->pdo = new Connection();
        $this->pdo = $this->pdo->getmyDB();
    }

    public function select($select)
    {
        $this->select = $select;
        return $this;
    }

    public function from($table)
    {
        $this->table = $table;
        return $this;
    }

    public function where($key, $value)
    {
        $this->where[0] = $key;
        $this->where[1] = $value;
        return $this;
    }
    
    public function whereIn($whereIn)
    {
        $this->whereIn = $whereIn;
        return $this;
    }

    public function orWhere($orKey, $orValue)
    {
        $this->orWhere[0] = $orKey;
        $this->orWhere[1] = $orValue;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function get()
    {
        // در صورتی که از شرط 
        // where
        // استفاده نشود باید طبق شرط زیر چک کنید
        // که خالی باشد وگرنه به خطا میخورد
        /**
         * 
         */
        if(!empty($this->where)) {
            $key = $this->where[0];
            $value = $this->where[1];
        }

        /**
         * 
         */
        if(!empty($this->orWhere)) {
            $orKey = $this->orWhere[0];
            $orValue = $this->orWhere[1];
        }

        /**
         * 
         */
        if(!empty($this->whereIn)) {
            $inKey = $this->whereIn[0];
            $inValue = $this->whereIn[1];
        }

        /**
         *
         */
        $where = (!empty($this->where)) ? "WHERE $key='$value'" : '';
        /**
         * 
         */
        $orWhere = (!empty($this->orWhere)) ? "OR WHERE $orKey='$orValue'" : '';
        /**
         * 
         */
        $whereIn = (!empty($this->whereIn)) ? "WHERE IN $inKey='$inValue'" : '';

        /**
         * 
         */
        $query = $this->pdo->query("SELECT {$this->select} FROM {$this->table} $where $orWhere $whereIn")->fetch();
        return $query;
    }
}

