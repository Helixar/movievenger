<?php

require '../traits/FilmTrait.php';

class Film
{
    use FilmTrait;

    public function getAll(): array
    {
        return DAO::getInstance()
            ->execute('select film.name, film.release_date,avg(v.note) as note from film
                            inner join vote v on film.id = v.id_film group by film.name;')
            ->fetchAll();
    }

    public function getById(int $id): array
    {
        return DAO::getInstance()
            ->execute('select * from film where film.id = :id', [
                ':id' => $id
            ])
            ->fetch();
    }

    public function getByCategory(int $id): array
    {
        return DAO::getInstance()
            ->execute('select film.name as film_name, film.length as film_length, c.name as category_name from film
                             inner join film_category fc on film.id = fc.id_film
                             inner join category c on fc.id_category = c.id where c.id = 1;')
            ->fetchAll();
    }
}