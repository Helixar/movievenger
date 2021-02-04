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
}