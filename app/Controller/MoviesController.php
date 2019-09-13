<?php

class MoviesController extends Smarty
{
    public function viewAction()
    {
        self::assign("movie", '/C/workspace/');
        self::display(DIR_TEMPLATES . 'Movies/view.tpl');
    }

    public function debbugAction()
    {
        $search = new Search();
        //var_dump($search->getMovies()); die;
        $tab = [
            "hess",
            "coucou",
            "kellia",
            "elsa"
        ];
        self::assign("data", $tab);
        self::assign("movies", $search->getMovies(7));
        self::display(DIR_TEMPLATES . 'Movies/debbug.tpl');
    }
}

