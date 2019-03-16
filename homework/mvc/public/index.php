<?php
define('APPLICATION_PATH', getcwd().'/../app/');
define('PUBLIC_PATH', getcwd());

require APPLICATION_PATH.'../vendor/autoload.php';
new \App\Core\Config(); //Bootstrap.php //Core //Loader


// /users/test
$routes = explode('/', $_SERVER['REQUEST_URI']);
$controller_name = "Main";
$action_name = 'defaultPage';
// получаем контроллер
if (!empty($routes[1])) {
    $controller_name = $routes[1]; //posts
}

// получаем действие
if (!empty($routes[2])) {
    $action_name = $routes[2]; //create
}
$filename = APPLICATION_PATH."controllers/".strtolower($controller_name).".php";
try {
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception("File not found");
    }

    $classname = '\App\\'.ucfirst($controller_name);// \App\Posts

    if (class_exists($classname)) {
        $controller = new $classname();
    } else {
        throw new Exception("File found but class not found");
    }

    if (method_exists($controller, $action_name)) {
        $controller->$action_name();
    } else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require APPLICATION_PATH."errors/404.php";
}

//router + controller + model

