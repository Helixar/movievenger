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

    public function logUser(string $Pseudo, string $Password): array
    {
        return DAO::getInstance()
        ->execute("SELECT * FROM user WHERE username = :pseudo AND password = :password", [
            ':pseudo' =>$Pseudo,
            ':password' => $Password
        ])
        ->fetch();
    }

    public function addUser(string $Pseudo, string $Password, string $Email)
    {
        return DAO::getInstance()
        ->execute("INSERT INTO user (id, username, password, email) VALUES (NULL, :username, :password, :email)", [
            ':id' =>'',
            ':username' => $Pseudo,
            ':password' => $Password,
            ':email' => $Email
        ]);
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