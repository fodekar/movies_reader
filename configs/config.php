<?php

const DIR = DIR_ROOT . '../';
const DIR_APP = DIR_ROOT . '../app/';

const DIR_CONFIG        = DIR . 'configs/';
const DIR_SERVICES      = DIR_APP . 'Services/'; 
const DIR_ENTITY        = DIR_APP . 'Entity/';
const DIR_CONTROLLER    = DIR_APP . 'Controller/';
const DIR_LIBRARY       = DIR . 'libs/';
const DIR_TEMPLATES     = DIR . 'templates/';


require_once(DIR_LIBRARY . '/smarty/libs/Smarty.class.php');
 
$smarty = new Smarty();
$smarty->setTemplateDir(DIR . '/templates')
       ->setCompileDir(DIR . '/templates_c')
       ->setCacheDir(DIR . '/cache');