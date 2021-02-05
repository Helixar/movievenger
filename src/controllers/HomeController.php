<?php

class HomeController
{
    public function index(): void
    {
        $film = new Film();
        $film_list = $film->getAll();
        debug($film_list);

        require '../src/views/index.php';
    }

    public function add(): void
    {
        require '../src/views/formulaireFilm.php';
    }
}