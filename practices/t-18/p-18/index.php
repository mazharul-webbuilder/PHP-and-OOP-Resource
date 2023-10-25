<?php

require_once "Logger.php";

$logger = Logger::getInstance();
$logger->log("Log message 1"). PHP_EOL;
$logger->log("Log message 2");

$logs = $logger->getLogs();
foreach ($logs as $log) {
    echo $log . "\n";
}