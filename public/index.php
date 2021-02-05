<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const ROOT = __DIR__;


$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);
$_SESSION['path'] = $path;

require '../src/helpers/functions.php';
//require '../traits/Database.php';
require '../src/models/DAO.php';
require '../src/models/Film.php';
require '../src/models/Category.php';
require '../src/controllers/HomeController.php';

showSession(true);

$home = new HomeController;
if ($path === '/') {
    $home->index(!empty($_GET['category']) ? $_GET['category'] : false);
} elseif ($path === '/add') {
    $home->add();
} elseif ($path === '/login') {
    $home->login();
} elseif ($path === '/film') {
    $home->film(!empty($_GET['id']) ? $_GET['id'] : false);
} else {
    http_response_code(404);
    require __DIR__ . '/../views/404.php';
}