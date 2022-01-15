<?php
namespace App\Providers;

// این کلاس برای این طراحی شده که
// در مدل های مورد نظر از دوباره 
// نوشتن کویری ها جلوگیری کند
// در اصل شبیه به یک
// orm
// میباشد
// ولی نه به اندازه آن قوی ولی سعی میشود
// آنرا ارتقا داد
class QueryBuilder{

    private $pdo;
    public function __construct()
    {
        $this->pdo = new Connection();
        $this->pdo = $this->pdo->getmyDB();
    }

    /**
     * سلکت میکند همه را
     * اگر وجو دارد
     */
    public function selectAll($table)
    {
        // var_dump($table);
        // die();
        $stmt = $this->pdo->query("SELECT * FROM {$table}")->fetch();
        return $stmt;
    }

    /**
     * سلکت میکند بر اساس
     * آی دی
     */
    public function findById($table, $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = ?");
        $stmt->execute([$id]);
        $stmt = $stmt->fetchAll();
        return $stmt;
    }

    public function update($table, $id, $params)
    {
        $maked = [];
        foreach ($params as $key => $value) {
            $maked[] = "$key=:$key";
        }
        $sql = sprintf(
            "update %s set %s where id=$id",
            $table,
            implode(', ', $maked)
        );
        $this->pdo->prepare($sql)->execute($params);
    }

    public function delete($table, $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE id={$id}");
        $stmt->execute();
    }

    public function insert($table, $params)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(' ,', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
    }

    /**
     * در صورتی که شرط برقرار باشد
     * سلکت میکند
     */
    public function where($table, $key, $value)
    {
        $stmt = $this->pdo->query("SELECT * FROM {$table} WHERE $key = '$value'");
        $stmt->execute([$key => $value]);
        $stmt = $stmt->fetchAll();
        return $stmt;
    }

    /**
     * در صورتی که وجو نداشته باشد
     */
    public function whereNot($table, $key, $value)
    {
        $stmt = $this->pdo->query("SELECT * FROM {$table} WHERE NOT $key = '$value'");
        $stmt = $stmt->fetchAll();
        return $stmt;
    }

    /**
     * در صورتی که پوچ باشد
     */
    public function whereNull($table, $key)
    {
        $stmt = $this->pdo->query("SELECT * FROM {$table} WHERE $key = NULL");
        $stmt->execute([$key]);
        $stmt = $stmt->fetchAll();
        return $stmt;
    }

        /**
     * در صورتی که پوچ نباشد
     */
    public function whereNotNull($table, $key)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE $key = NULL");
        if(!$stmt) {
            return 'null';
        } 
        $stmt->execute();
        $stmt = $stmt->fetchAll();
        return $stmt;
    }
}