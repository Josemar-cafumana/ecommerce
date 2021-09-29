<?php

ob_start();

session_start();

require_once("vendor/autoload.php");

use \Slim\Slim;


$app = new Slim();

$app->config('debug', true);

require_once("Controllers/site.php");
require_once("Controllers/admin.php");
require_once("Controllers/admin-users.php");
require_once("Controllers/admin-categorias.php");
require_once("Controllers/admin-products.php");





ob_end_flush();
$app->run();

 ?>