<?php

const DIR_ROOT = __DIR__ . '/';

include("../configs/config.php");
include(DIR_CONFIG . "autoload.php");

/***
 *  Router Class
 * 
 *  Display Controller and Action for output template
 */
class Router extends Smarty
{
    protected $controller;
    protected $action;
    protected $id;
    public    $params_autorized = ['controller', 'action', 'id'];

    public function __construct()
    {
        $this->setParams();

        $this->controller = ucfirst($this->controller) . 'Controller';
    }

    public function dispatch()
    {
        $controller_name = $this->controller;

        if (class_exists($controller_name)) {
            $controller = new $this->controller();
            $action     = $this->action . 'Action';
            
            if (method_exists($controller_name, $action))
                $controller->$action();
            else
                throw new Exception("L'action {$controller_name}::$action demandée n'existe pas.");    
        }
        else {
            throw new Exception("La classe {$controller_name} demandée n'existe pas.");
        }
    }

    public function setParams()
    {
        foreach ($_GET as $key => $value) {
            if (in_array($key, $this->params_autorized)) {
                $this->$key = $value;
            }
        }
    }
}

$routes = new Router();
$routes->dispatch();