<?php
declare(strict_types=1);

class LibraryItem
{
    protected string $title;
    protected string $author;
    protected int $year;
    public function __construct(string $title, string $author, int $year)
    {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getYear(): int
    {
        return  $this->year;
    }
}