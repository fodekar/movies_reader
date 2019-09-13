<?php

function services_autoloader($class) {
    $file = DIR_SERVICES . $class . '.php';
    
    if (file_exists($file))
        include $file;
}

function entity_autoloader($class) {
    $file = DIR_ENTITY . $class . '.php';
    
    if (file_exists($file))
        include $file;
}

function controller_autoloader($class) {
    $file = DIR_CONTROLLER . $class . '.php';
    
    if (file_exists($file))
        include $file;
}

spl_autoload_register('services_autoloader');
spl_autoload_register('entity_autoloader');
spl_autoload_register('controller_autoloader');