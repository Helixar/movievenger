<?php

require '../traits/CategoryTrait.php';

class Category
{
    use CategoryTrait;

    public function getAll(): array
    {
        return DAO::getInstance()
            ->execute('select * from category')
            ->fetchAll();
    }

    public function getFilmsBySlug(string $slug): array
    {
        return DAO::getInstance()
            ->execute('select film.name as film_name, film.length as film_length, c.name as category_name from film
                            inner join film_category fc on film.id = fc.id_film
                            inner join category c on fc.id_category = c.id
                            where c.slug = :slug and
                            film.published_at is not null', [
                    ':slug' => $slug
                ])
            ->fetchAll();
    }
}