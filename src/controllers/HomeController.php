<?php

class HomeController
{
    public function index(?string $byCategory): void
    {
        $filmClass = new Film();
        $film_list = $byCategory ? $filmClass->getByCategorySlug($byCategory) : $filmClass->getAll();

        $categoryClass = new Category();
        $category_list = $categoryClass->getAll();

        require '../src/views/index.php';
    }

    public function add(): void
    {
        require '../src/views/formulaireFilm.php';
    }

    public function film(?string $id): void
    {
        $filmClass = new Film();
        $film = !empty($id) ? $filmClass->getById(intval($id)) : false;

        $categoryClass = new Category();
        $category_list = $categoryClass->getAll();
        
        require '../src/views/affichageFilm.php';
    }
}