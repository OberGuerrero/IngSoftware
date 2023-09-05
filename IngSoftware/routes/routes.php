<?php
$rutaArray = explode('/', $_SERVER['REQUEST_URI']);
var_dump($rutaArray);
$inputs = array();
$inputs['raw_input'] = @file_get_contents('php://input');
$_POST = json_decode($inputs ['raw_input'], true);

echo $endPoint;
$method = $_SERVER['REQUEST_METHOD'];
echo $method;
switch ($endPoint){
case 'courses':
    if (isset($_POST))
    {
        $course = new ControllerCourses($method,$complement,$_POST);
    }else{
        $course = new ControllerCourses($method,$complement,0);
    }
    $course->index();
    break;
}