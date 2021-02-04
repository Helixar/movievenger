<?php

require '../traits/FilmTrait.php';

class Film
{
    use Database, FilmTrait;

    public function getAll()
    {
        $films = $this->prepare('select * from film');
        return $films;
    }
}