<?php

namespace App\Models;

use App\Providers\Model;

class Product extends Model{

    public function __construct()
    {
        parent::__construct('users');
    }
}
