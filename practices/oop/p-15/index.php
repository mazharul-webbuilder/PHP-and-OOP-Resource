<?php

require_once "File.php";


$file1 = new File("file1.txt", 1000);
$file2 = new File("file2.txt", 1000);
$file3 = new File("file3.txt", 1000);
$file4 = "Demo variable";

echo "Size " . File::getTotalSizeOfFiles([$file1, $file2,  $file3, $file4]);