<?php

namespace App\Model;

use App\Enum\BookStatus;

class Book
{
    private BookStatus $status;

    public function __construct(
        private int $id,
        private string $title,
        private string $author,
        private string $isbn,
    ) {
        $this->status = BookStatus::Available;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function borrow(): void {
        $this->status = BookStatus::Borrowed;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function return(): void {
        $this->status = BookStatus::Available;
    }

    public function getStatus(): BookStatus {
        return $this->status;
    }

    public function getTitle(): string {
        return $this->title;
    }
}
