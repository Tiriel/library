<?php

use App\Controller\BookController;
use App\Manager\BookManager;
use App\Model\Book;
use App\Notifications\EmailNotifier;
use App\Repository\BookRepository;
use App\Router;

require_once __DIR__.'/vendor/autoload.php';

$repository = new BookRepository();
$notifier = new EmailNotifier();
$manager = new BookManager($repository, $notifier);
$bookController = new BookController($manager, $repository);

// Remplir la bibliothèque avec des livres
$repository->add(new Book(1, "1984", "George Orwell", "123456789"));
$repository->add(new Book(2, "Brave New World", "Aldous Huxley", "987654321"));

// Initialisation du routeur
$router = new Router();
$router->addRoute('/book/borrow/(\d+)', [$bookController, 'borrow']);
$router->addRoute('/book/return/(\d+)', [$bookController, 'returnBook']);

// Dispatching
$router->dispatch($_SERVER['REQUEST_URI']);
