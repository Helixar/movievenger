<?php

class HomeController
{
    public function index(): void
    {
        $film = new Film();
        $film_list = $film->getAll();
        debug($film_list);

        require '../views/index.php';
    }

    public function add(): void
    {
        require '../views/formulaireFilm.php';
    }
}