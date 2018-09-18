<?php

require_once 'vendor/autoload.php';
//require_once 'controller/HelloController.php';
//require_once  'model/db.php';


   // $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);
$path = str_replace('/php/', '', $_SERVER['REQUEST_URI']);
$parts = array_filter(explode('/', $path));
if (!count($parts))
{
    $parts[0] = 'hello';
    $parts[1] = 'hello';
}
$params = array_slice($parts, 2);
$temp = mb_convert_case($parts[0], MB_CASE_TITLE, "UTF-8");
$temp .= 'Controller';

if (!class_exists($temp)) {
    var_dump(404); exit;
}

$controller = new $temp();
$action =  $parts[1].'Action';

if (!method_exists($temp, $action)) {
    var_dump(404); exit;
}

$controller->{$action}($params);