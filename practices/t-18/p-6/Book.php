<?php

class Book extends LibraryItem
{
    protected string $genre;

    public function __construct(string $title, string $author, int $year, string $genre)
    {
        parent::__construct($title, $author, $year);
        $this->genre = $genre;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }


    public function displayDetails(): void
    {
        echo "Title is: " . $this->title . PHP_EOL;
        echo "Author is: " . $this->author . PHP_EOL;
        echo "Year is: " . $this->year . PHP_EOL;
        echo "Genre is: " . $this->genre. PHP_EOL;
    }

}