<?php

require_once 'vendor/autoload.php';
//require_once  'model/db.php';

// Define the routes table
$defaultAction = "indexAction";
$routes = array(
    '/\/hello\/(.+)/' => array('HelloController', 'helloAction'),
	'/\/account\//' => array('AccountController', 'indexAction'),
    '/\/account\/registration/' => array('AccountController', 'registrationAction'),
);


foreach ($routes as $url => $action) {
    $matches = preg_match($url, $_SERVER['REQUEST_URI'], $params);
    if ($matches > 0) {
        var_dump($action);
        $controller = new $action[0];
        $controller->{$action[1]}($params);
        break;
    }
//    else
//    {
//        $controller = new NotFoundController();
//        $controller->indexAction();
//        header('Location: /php');
//    }

}