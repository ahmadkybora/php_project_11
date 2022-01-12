<?php

require_once __DIR__."/../vendor/autoload.php";

/**
 * this statement for load env variable to global 
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();