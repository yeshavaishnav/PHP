<?php

require_once '../Vendor/vendor/autoload.php';
Twig_autoloader::register();

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});


$router = new Core\Router();
$url = $_SERVER['QUERY_STRING'];
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}', ['namespace' => 'Admin']);
$router->add('{controller}/{id:\d+}/{action}');

echo "<br>";
$router->dispatch($url);
echo "<br>";
