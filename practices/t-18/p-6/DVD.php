<?php

class DVD extends LibraryItem
{
    protected float|int $duration;

    public function __construct(string $title, string $author, int $year, float|int $duration)
    {
        parent::__construct($title, $author, $year);

        $this->duration = $duration;
    }

    /**
     * @return float|int
     */
    public function getDuration(): float|int
    {
        return $this->duration;
    }

    public function displayDetails(): void
    {
        echo "Title is: " . $this->title . PHP_EOL;
        echo "Author is: " . $this->author . PHP_EOL;
        echo "Year is: " . $this->year . PHP_EOL;
        echo "Duration is: " . $this->duration. PHP_EOL;
    }
}