<?php

$logger = new FileLogger();
$logger->write('my log');
$logger->output();

$logger = new DatabaseLogger();
$logger->write('my log');
$logger->output();