<?php

class HomeController
{
    public function index(?string $byCategory): void
    {
        $filmClass = new Film();
        $film_list = $byCategory ? $filmClass->getByCategorySlug($byCategory) : $filmClass->getAll();

        $categoryClass = new Category();
        $category_list = $categoryClass->getAll();
        // debug($category_list);

        require '../src/views/index.php';
    }

    public function add(): void
    {
        require '../src/views/formulaireFilm.php';
    }
}