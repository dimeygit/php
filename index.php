<?php

require_once 'vendor/autoload.php';

define('BASE_URL', '/php/');


$path = str_replace('/php/', '', $_SERVER['REQUEST_URI']);
$parts = array_filter(explode('/', $path));

if (!count($parts))
{
    $parts[0] = 'index';
    $parts[1] = 'index';
}
$params = array_slice($parts, 2);
$controllerRoute = mb_convert_case($parts[0], MB_CASE_TITLE, "UTF-8");
$controllerRoute .= 'Controller';

if (!class_exists($controllerRoute)) {
    $controllerRoute = 'NotFoundController';
}
$controller = new $controllerRoute();

if (!isset($parts[1]))
    $action = 'indexAction';
else
    $action =  $parts[1].'Action';

if (!method_exists($controllerRoute, $action)) {
    $action = 'indexAction';
}

$controller->{$action}($params);