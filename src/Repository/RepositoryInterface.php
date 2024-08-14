<?php

namespace App\Repository;

use App\Model\Book;

interface RepositoryInterface
{
    public function add(object $model): void;
    public function remove(object $model): void;
    public function update(object $model): void;
    public function getById(int $id): ?object;
}
