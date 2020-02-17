<?php

require_once dirname(__DIR__) . '/Vendor/vendor/autoload.php';

Twig_autoloader::register();

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $file;
    }
});

$router = new Core\Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}', ['namespace' => 'Admin']);
$router->add('{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];
$router->dispatch($url);
