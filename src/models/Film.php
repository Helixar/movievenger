<?php

require '../src/traits/FilmTrait.php';

class Film
{
    use FilmTrait;

    public function getAll(): array
    {
        return DAO::getInstance()
            ->execute('select film.id, film.name, film.release_date, film.image, ifnull(round(avg(v.note), 1), 0) as note from film
                            left join vote v on film.id = v.id_film group by film.name;')
            ->fetchAll();
    }

    public function getById(int $id): array
    {
        return DAO::getInstance()
            ->execute('select film.id, film.name, film.release_date, film.image, film.synopsis, ifnull(round(avg(v.note), 1), 0) as note from film
                left join vote v on film.id = v.id_film where film.id = :id;', [
                ':id' => $id
            ])
            ->fetch();
    }

    public function getByCategorySlug(string $slug): array
    {
        return DAO::getInstance()
            ->execute('select film.id, film.name, film.release_date, film.length, film.image, ifnull(round(avg(v.note), 1), 0) as note, c.name as category_name from film
                             inner join film_category fc on film.id = fc.id_film
                             inner join category c on fc.id_category = c.id
                             left join vote v on film.id = v.id_film where c.slug = :slug group by film.name;', [
            ':slug' => $slug
        ])
            ->fetchAll();
    }
}