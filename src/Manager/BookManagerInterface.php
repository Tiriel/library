<?php

namespace App\Manager;

use App\Model\Book;
use App\Model\User;

interface BookManagerInterface
{
    public function borrowBook(User $user, Book $book): void;
    public function returnBook(User $user, Book $book): void;
}
