<?php

require_once __DIR__. "/../config/database.php";
require_once __DIR__. "/../routes/web.php";

/**
 * this instance for connection
 */
new App\Providers\Connection();

/**
 * this instance for router
 */
new App\Providers\BaseRoute($router);