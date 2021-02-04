<?php

class HomeController
{
    public function index(): void
    {
        $film = new Film();
        debug($film->getAll());
        require '../views/index.php';
    }
}