<?php
namespace App\Models;
// require_once __DIR__ . '/../Providers/Connection.php';

// use App\Providers\Connection;
// use App\Providers\QueryBuilder;
use App\Providers\Model;

class User extends Model{    

    public $first_name;
    public $last_name;
    public $username;

    // اینجا بوسیله کلمه کلیدی
    // والد توانستیم اسم جدول مورد نظر را
    // به مدل اصلی پاس داده
    // و از پویا بودن آن استفاده کنیم
    public function __construct()
    {
        parent::__construct('users');
        // return $this->setTable('users');
        // parent::setTable('users');
    }
    // public function __construct()
    // {
        // هنگامی که پایگاه داده را 
        // نمونه‌سازی می‌کنید، $dbh ایجاد
        // می‌کنید، اما نمونه‌سازی پایگاه داده
        // تنها نمونه‌ای از کلاس پایگاه داده
        // شما را برمی‌گرداند، نه اتصال db
        // شما. شما باید یک getDb داشته
        // باشید تا اتصال خود را از شی
        // پایگاه داده دریافت کنید:
        // $this->db = new QueryBuilder();
        // اگر از روش بالا استفاده نکنید
        // اتصال به دیتابیس انجام نمیشود
        /**
         * حالت های متد fetch
         * PDO::FETCH_NUM : یک آرایه ی عددی (ایندکس عددی) را بر میگرداند.
         * PDO::FETCH_ASSOC : یک آرایه ی متناظر را بر میگردند.
         * PDO::FETCH_BOTH : هر دو مورد بالا را بر میگرداند.
         * PDO::FETCH_OBJ : یک شیء را بر میگرداند.
         * PDO::FETCH_LAZY : بدون اینکه حافظه ی برنامه مختل و اشغال شود، برای شما استفاده از هر سه مورد (آرایه ی عددی، آرایه ی متناظر و شیء) را ممکن می کند.
        */
    // }

    // متد prepare
    // توضیحات کامل
    // https://beyamooz.com/php/97-database/3268-%D8%AF%D8%B3%D8%AA%D9%88%D8%B1-prepare-%D8%AF%D8%B1-php
    // 
    // public function all()
    // {
    //     return $this->db->selectAll($this->table);

        // the best example for sql query
        // https://websitebeaver.com/php-pdo-prepared-statements-to-prevent-sql-injection
        // $stmt = $this->pdo->query("SELECT * FROM {$this->table}")->fetch();
        // var_dump($stmt);

        // $stmt = $this->pdo->prepare("SELECT username FROM users")->execute();
        // $stmt = $stmt->fetch();
        // var_dump($stmt);
        // $pdo = $this->pdo->connect();
        //  var_dump($pdo);
        // require_once __DIR__ . '../../../database/config.php';
        // $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        // var_dump($stmt);
        // while ($row = $stmt->fetch())
        // {
        //     echo $row['username'] . "\n";
        // }
    // }

    // بنابراین برای هر کوئری که دارای حتی یک متغیر است و شما می خواهید اجرایش کنید، باید ابتدا از یک
    // placeholder (به معنی جا گیرنده - در قسمت های قبلی در مورد آن ها صحبت شد) استفاده کنید، سپس کوئری
    // خود را prepare کرده و اجرا کنید. خلاصه برایتان بگویم، کار خیلی سختی نیست. در اکثر مواقع تنها به دو تابع
    // execute prepare
    // دو متد بالا
    // public function find($id)
    // {
        // شبیه سازی شده از روی لاراول
        // در صورتی که وجود داشته باشد برمیگرداند
        // ولی در صورتی که وجود نداشته باشد
        // خطای 404 میدهد
        // $result = $this->db->findById($this->table, $id);
        // if(!$result)
        //     return "404 not found";
        // return $result;
        // var_dump($b);
        // die();
        // اتصال به دیتابیس بوسیله
        // pdo
        // مرجعی خوب
        // https://www.roxo.ir/how-to-connect-to-the-database-using-pdo
        // دلیل استفاده کردن از متد زیر
        // جلوگیری از 
        // sql injection
        // میباشد

        /**
         * زمانیکه کویری ما دارای حتی یک متغییر است از 
         * اینها استفاده میکنیم
         * // مثل زیر
         */
        // $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        // $stmt->execute([$id]);
        // $stmt = $stmt->fetchAll();
        // return $stmt;
        // if(!$arr) exit('No rows');
        // var_export($arr);
        // $stmt = null; 
    // }

    // این متد در اصل شبیه سازی
    // شده همان متد کرییت لاراول است
    // در اصل کلید ولیو را میفرستیم
    // و در اینجا ذخیره میکنیم
    // public function create($datas = array())
    // {
    //     $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (first_name, last_name, username) VALUES (:first_name, :last_name, :username)");
    //         $stmt->execute([
    //             ':first_name' => $datas['first_name'], 
    //             ':last_name' => $datas['last_name'], 
    //             ':username' => $datas['username']
    //         ]);
    // }

    // این متد در اصل شبیه سازی 
    // شده متد ذخیره در لاراول است اما
    // نه به آن حرفه ای بودن
    // توجه کنید که در اینجا اسامی ستون گرفته شده و وارد میشوند
    // public function save()
    // {
    //     $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (first_name, last_name, username) VALUES (:first_name, :last_name, :username)");
    //     $stmt->execute([
    //         ':first_name' => $this->first_name, 
    //         ':last_name' => $this->last_name, 
    //         ':username' => $this->username
    //     ]);
    // }

    // public function where($key, $value)
    // {
    //     return $this->db->where($this->table, $key, $value);
    // }

    // public function whereNot($key, $value)
    // {
    //     return $this->db->whereNot($this->table, $key, $value);
    // }

    // public function whereNull($key)
    // {
    //     return $this->db->whereNull($this->table, $key);
    // }

    // public function whereNotNull($key)
    // {
    //     return $this->db->whereNotNull($this->table, $key);
    // }

}
// $user = new User();
// $user->setTable('users');
// array(1) { [0]=> array(4) { [0]=> int(2) [1]=> string(5) "mahdi" [2]=> string(19) "2022-01-12 12:07:04" [3]=> string(19) "2022-01-12 12:07:04" } }
// array(1) { [0]=> array(4) { ["id"]=> int(2) ["username"]=> string(5) "mahdi" ["created_at"]=> string(19) "2022-01-12 12:07:04" ["updated_at"]=> string(19) "2022-01-12 12:07:04" } }