<?php

$router = new AltoRouter;

$router->map('GET', '/', 'App\Http\Controllers\HomeController@index', 'index');
