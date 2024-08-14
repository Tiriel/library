<?php

namespace App\Controller;

use App\Manager\BookManager;
use App\Model\User;
use App\Repository\BookRepository;

class BookController
{
    public function __construct(
        protected BookManager $manager,
        protected BookRepository $repository,
    ) {
    }

    public function borrow(string $title): void {
        $user = new User("Alice", "alice@example.com"); // Pour l'exemple, on utilise un utilisateur fixe
        $book = $this->repository->getById($title);

        if ($book) {
            $this->manager->borrowBook($user, $book);
            $this->render('borrow_success', ['book' => $book]);
        } else {
            echo "Book not found";
        }
    }

    public function returnBook(int $id): void {
        $user = new User("Alice", "alice@example.com"); // Pour l'exemple, on utilise un utilisateur fixe
        $book = $this->repository->getById($id);

        if ($book) {
            $this->manager->returnBook($user, $book);
            $this->render('return_success', ['book' => $book]);
        } else {
            echo "Book not found";
        }
    }

    private function render(string $view, array $data = []): void {
        extract($data);
        include __DIR__ . "/../views/$view.php";
    }
}
