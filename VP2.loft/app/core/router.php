<?php
$controllerName = 'main';
$actionName = 'display';
$routes = explode('/', $_SERVER['REQUEST_URI']);
if (!empty($routes[1])) {
    $controllerName = $routes[1];
}
if (!empty($routes[2])) {
    $actionName = $routes[2];
}
$file = CONTROLLERS . $controllerName . '.php';

try {
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("File not found");
    }
    $class = 'App\Controllers\\' . ucfirst($controllerName);
    if (class_exists($class)) {
        $controller = new $class;
    } else {
        throw new Exception("File found but class not found");
    }
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        throw new Exception("Method not found");
    }
} catch (Exception $e) {
    require ERRORS . "404.php";
}
