<?php
namespace App\Http\Controllers;
// include __DIR__ . '/../../Providers/Connection.php';

// use App\Providers\QueryBuilder;

use App\Models\Product;
use App\Models\User;
use App\Providers\Connection;
use App\Providers\DB2;

class HomeController{

    // private $pdo;
    // private $table = 'users';

    // public function __construct()
    // {
    //     $this->pdo = new Connection();
    //     // $this->pdo = $this->pdo->getmyDB();
    // }

    private $str;
    function __construct()
    {
        $this->str = "";
    }
    
    function addA()
    {
        $this->str .= "a";
        return $this;
    }
    
    function addB()
    {
        $this->str .= "b";
        return $this;
    }
    
    function getStr()
    {
        return $this->str;
    }

    public function index()
    {
        // $stmt = $this->pdo->query("SELECT * FROM users")->fetchAll();
        // var_dump($stmt);
        // if($stmt->execute()) {
        //     while($rows = $stmt->fetch()) {
        //         $fetch[] = $rows;
        //     }
        //     return $fetch;
        // }
        // else {
        //     return false;
        // }
        // var_dump($stmt);
        // $user = new User();
        // $b = $user->all();
        // var_dump($b);
        //    var_dump($this->addA()->addB()->getStr());
        $b = new DB2();
        $b = $b->select('*')->from('users')->get();
        $product = new Product();
        var_dump($b);
        die();
        // die();
        // $user->create([
        //     "first_name" => "ahmad1", 
        //     "last_name" => "montazeri1", 
        //     "username" => "kybora1"
        // ]);
        // var_dump($user);
        // $b = $user->findByid(2);
        // var_dump($b);
        // $user->first_name = "ahmad";
        // $user->last_name = "montazeri";
        // $user->username = "kybora";
        // // var_dump($user);
        // // die();
        // $user->save();
        // var_dump($user);

        // $user->create([1, 'to']);
        // echo $user->all();
    }
}

// object(App\Models\User)#21 (6) { 
//     ["user":"App\Models\User":private]=> NULL 
//     ["pdo":"App\Models\User":private]=> object(PDO)#35 (0) { } 
//     ["table":"App\Models\User":private]=> string(5) "users" ["first_name"]=> string(5) "ahmad" ["last_name"]=> string(9) "montazeri" ["username"]=> string(6) "kybora" }