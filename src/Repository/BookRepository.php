<?php

namespace App\Repository;

use App\Model\Book;
use App\Repository\RepositoryInterface;

class BookRepository implements RepositoryInterface
{
    private array $books = [];

    public function add(object $model): void {
        $this->books[$model->getId()] = $model;
    }

    public function remove(object $model): void {
        unset($this->books[$model->getId()]);
    }

    public function update(object $model): void {
        $this->books[$model->getId()] = $model;
    }

    public function getById(int $id): ?object
    {
        return $this->books[$id] ?? null;
    }
}
