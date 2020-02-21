<?php

namespace Core;

use \App\Controllers;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params = [])
    {
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }
    public function getRoutes()
    {
        return $this->routes;
    }
    public function match($url)
    {
        $url = $this->removeQueryStringVariables($url);
        $reg_exp = array(
            'reg_exp1' => "/^(?P<controller>[a-z]+)\/(?P<action>[a-z]+)$/",
            'reg_exp2' => "/^(?P<controller>[a-z]+)\/(?P<id>\d+)\/(?P<action>[a-z]+)$/",
            'reg_exp3' => "/^admin\/(?P<action>[a-z]+)\/(?P<controller>[a-z]+)$/",
        );

        foreach ($reg_exp as $element => $item) {
            if (preg_match($item, $url, $matches)) {
                $params = [];
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
    }
    public function getParams()
    {
        return $this->params;
    }
    public function dispatch($url)
    {
        if ($url == "") {
            $controller = 'User';
            $controller = $this->getNamespace() . $controller;
            $obj = new $controller();
            $obj->index();
        } else {
            if ($this->match($url)) {
                $controller = $this->params['controller'];
                $controller = $this->convertToStudlyCaps($controller);
                $controller = $this->getNamespace() . $controller;

                if (class_exists($controller)) {
                    $controllerObject = new $controller($this->params);
                    $action = $this->params['action'];
                    $action = $this->convertToCamelCase($action);

                    if (is_callable([$controllerObject, $action])) {
                        $controllerObject->$action();
                    }
                }
            } else {

                $page = new \App\Controllers\Page();
                if (!$page->display($url)) {
                    $obj = new \App\Controllers\Error();
                    $obj->display();
                }
            }
        }
    }
    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }
    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }
    protected function removeQueryStringVariables($url)
    {
        if ($url != "") {
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }
        return $url;
    }
    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }
}
