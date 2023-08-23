<?php

$logger = new FileLogger(new FileManager());
$logger->write('my log');
$logger->output();

$logger = new DatabaseLogger(new DatabaseManager());
$logger->write('my log');
$logger->output();