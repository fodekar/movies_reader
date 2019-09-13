
<?php

// start_session

try {
    session_start(); 
}
catch(\Exception $e) {}

const DIR_ROOT = __DIR__ . '/';

// Include services

include("../configs/config.php");
include(DIR_CONFIG . "autoload.php");


$smarty->assign('name', 'comcable');
$smarty->display(DIR_TEMPLATES . 'index.tpl');

/*
$search = new Search();
$movies = $search->getMovies();
 

var_dump($movies, 'list movies');
*/

?>
