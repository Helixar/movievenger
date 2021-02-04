<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const ROOT = __DIR__;


$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$_SESSION['path'] = $path;

require '../helpers/functions.php';
require '../traits/Database.php';
require '../models/Film.php';
require '../controllers/HomeController.php';

showSession(true);

if ($path === '/') {
    $home = new HomeController;
    $home->index();
}elseif ($path === '/add') {

}else {
    http_response_code(404);
    require __DIR__ . '../views/404.php';
}