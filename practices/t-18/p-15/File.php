<?php

class File
{
    protected string $name;
    protected mixed $size;

    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }
    public static function getTotalSizeOfFiles(array $files): int
    {
        $size_counter = 0;

        foreach ($files as $file) {
            if ($file instanceof File) {
                $size_counter += 1;
            }
        }
        return $size_counter;
    }
}