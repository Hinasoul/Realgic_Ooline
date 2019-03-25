<?php
session_start();
require "vendor/autoload.php";
use \RealgicOoline\controller\Router;

$router= new Router();
$router->run(); 