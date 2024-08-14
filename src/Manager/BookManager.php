<?php

namespace App\Manager;

use App\Enum\BookStatus;
use App\Model\Book;
use App\Model\User;
use App\Notifications\NotifierInterface;
use App\Repository\RepositoryInterface;

class BookManager implements BookManagerInterface
{
    public function __construct(
        protected RepositoryInterface $libraryRepository,
        protected NotifierInterface $notificationService
    ) {
    }

    public function borrowBook(User $user, Book $book): void {
        if ($book->getStatus() !== BookStatus::Available) {
            throw new \Exception("Le livre '{$book->getTitle()}' n'est pas disponible.");
        }

        $book->borrow();
        $this->libraryRepository->update($book);
        $this->notificationService->notify($user, "Vous avez emprunté le livre '{$book->getTitle()}'.");
    }

    public function returnBook(User $user, Book $book): void {
        if ($book->getStatus() !== BookStatus::Borrowed) {
            throw new \Exception("Le livre '{$book->getTitle()}' n'est pas emprunté.");
        }

        $book->return();
        $this->libraryRepository->update($book);
        $this->notificationService->notify($user, "Vous avez rendu le livre '{$book->getTitle()}'.");
    }
}
