<?php

require_once "Logger.php";

$log = new Logger();
$log->log("This is log 1");
$log->log("This is log 2");
$log->log("This is log 3");
echo PHP_EOL;

echo "Total Log method execute "  . Logger::$logCount . " Times";
echo PHP_EOL;

