<?php

// start_session

try {
    session_start();
}
catch(\Exception $e) {}

// Include services

include("Services/Search.php");

$search = new Search();
$movies = $search->getMovies();

var_dump($movies, 'list movies');
