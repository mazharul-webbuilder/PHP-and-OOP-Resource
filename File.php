<?php

class File {
    public function displayContent($file): void
    {
        if (!file_exists($file)) {
            echo "file does not exist";
        }

        echo file_get_contents($file). PHP_EOL;
    }
    public function getContent($file): string
    {
        if (!file_exists($file)) {
            echo "file does not exist";
        }

        return file_get_contents($file);
    }

}