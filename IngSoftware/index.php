<?php
require_once "model/ConDB.php";
require_once "controller/routesController.php";
require_once "model/coursesModel.php";
require_once "controller/coursesController.php";

header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");

$routes = new RoutesController();
$routes->index();

?>