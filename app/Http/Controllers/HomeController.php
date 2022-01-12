<?php
namespace App\Http\Controllers;
// require_once __DIR__ . '/../../../database/config.php';
use App\Providers\QueryBuilder;
use App\Models\User;

class HomeController extends Controller{

    public function index()
    {
        $user = new User();
        $user->all();
        // echo $user->all();
    }
}