<?php
class DBHandler
{
    public $columns = array();
    public $table;
    public $where;
    public $limit;
    public $query_elements = [' SELECT ', ' FROM ', ' WHERE ', ' LIMIT '];

    public function select($columns)
    {
        $this->columns = $columns;
        return $this;
    }

    public function from($table)
    {
        $this->table = $table;
        return $this;
    }

    public function where($where)
    {
        $this->where = $where;
        return $this;
    }

    public function limit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function result($selectedColumns = "*")
    {
        $query = $this->query_elements[0];
        // if the columns array is empty, select all columns else given columns
        if (count($this->columns)>=1 && !empty($this->columns[0])) {
            $query .= implode(', ', $this->columns);
        } else {
            $query .= $selectedColumns;
        }
        $query .= $this->query_elements[1];
        $query .= $this->table;
        if (!empty($this->where)) {
            $query .= $this->query_elements[2];
            $query .= $this->where;
        }
        if (!empty($this->limit)) {
            $query .= $this->query_elements[3];
            $query .= $this->limit;
        }
        return $query;
    }
}
/**
 * example
 */
//---------------------------------------------
// $objDBHandler = new DBHandler();
// $objDBHandler->select(['']);
// $objDBHandler->from('accounts');
// $objDBHandler->where('id=1');
// $objDBHandler->limit(10);
// echo $objDBHandler->result();
// // OR
// echo $objDBHandler->select([''])
//                   ->from('accounts')
//                   ->where('id=1')
//                   ->limit(10)
//                   ->result();
/**
 * example
 */
//---------------------------------------------
// $objDBHandler = new DBHandler();
// $objDBHandler->select([
//     'firstname',
//     'lastname',
//     'address',
//     'city']
// )->from('accounts')->where('id = 1');
// echo $objDBHandler ->result();
//---------------------------------------------
/**
* Method Chaining Using Traits
*/
//---------------------------------------------
// trait samsungGalaxy
// {
//     public function smartPhoneName()
//     {
//         $this->phoneName = __TRAIT__;
//         return $this;
//     }
//     public function battery($batteryCapacity)
//     {
//         $this->batteryCapacity = $batteryCapacity;
//         return $this;
//     }
// }
// class Mobile
// {
//     public $mobileType;
//     public $phoneName;
//     public $batteryCapacitype;
//     use samsungGalaxy;
//     public function mobileType($mobileType)
//     {
//         $this->mobileType = $mobileType;
//         return $this;
//     }
//     public function getMobileInfo()
//     {
//         return $this->phoneName . " is a " . $this->mobileType . " mobile having battery capacity of " . $this->batteryCapacity;
//     }
// }
// $obj = new Mobile();
// echo $obj->smartPhoneName()
//           ->mobileType('android')
//           ->battery('2000mh')
//           ->getMobileInfo();
//---------------------------------------------
/**
 * Method Chaining Using Interface
 */
//---------------------------------------------
// interface MyInterface
// {
//     public function methodA($methodA);
//     public function methodB($methodB);
// }
// abstract class MyClassName implements MyInterface
// {
//     public  function methodA($methodA)
//     {
//         $this->methodAproperty = $methodA;
//         return $this;
//     }
//     public abstract function methodB($methodB);
// }
// class MyChildClassName extends MyClassName
// {
//     public $methodAproperty, $methodBproperty;
//     public  function methodB($methodB)
//     {
//         $this->methodBproperty = $methodB;
//         return $this;
//     }
//     public function getAllMethodsInfo() 
//     {
//         return "Interface methods are " . $this->methodAproperty . " & " . $this->methodBproperty;
//     }
// }
// $obj = new MyChildClassName;
// echo $obj->methodA('method A')
//          ->methodB('method B')
//          ->getAllMethodsInfo();
//---------------------------------------------
/**
 * Using Child Class
 */
//---------------------------------------------
// class Mobile
// {
//     public $mobileType;
//     public $phoneName;
//     public $batteryCapacitype;
//     public function mobileType($mobileType)
//     {
//         $this->mobileType = $mobileType;
//         return $this;
//     }
// }
// class samsungGalaxy extends Mobile
// {
//     public function smartPhoneName()
//     {
//         $this->phoneName = __CLASS__;
//         return $this;
//     }
//     public function battery($batteryCapacity)
//     {
//         $this->batteryCapacity = $batteryCapacity;
//         return $this;
//     }
//     public function getMobileInfo()
//     {
//         return $this->phoneName . " is a " . $this->mobileType . " mobile having battery capacity of " . $this->batteryCapacity;
//     }
// }
// $obj = new samsungGalaxy();
// echo $obj->smartPhoneName()
//     ->mobileType('android')
//     ->battery('2000mh')
//     ->getMobileInfo();
//---------------------------------------------
/**
 * Static Method Chaining
 */
//---------------------------------------------
// class studentDetails {
//     public static $id = 0;
//     public static $name = '';
//     public static $address ='';
//     public static function setStudentId($id) {
//      static::$id = $id;
//      return new static;
//     }
//     public static function setStudentName($name) {
//      static::$name = $name;
//      return new static;
//     }
//     public static function setStudentAddress($address) {
//      static::$address = $address;
//      return new static;
//     }
    
//     public static function getStudentInfo() {
//      return 'student '. static::$name. ' of id '.static::$id. ' stays at '. static::$address;
//     }
//    }
//    echo studentDetails::setStudentId(1423)
//    ->setStudentName('John')
//    ->setStudentAddress('LA')
//    ->getStudentInfo();