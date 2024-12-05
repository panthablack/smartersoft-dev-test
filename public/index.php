<?php

// Path resolution helper
function platformConsistentPathResove($path): string
{
    return str_replace('/', DIRECTORY_SEPARATOR, $path);
}

// Register autoloader
require __DIR__ . platformConsistentPathResove('/../vendor/autoload.php');

// // Handle the request
(require_once __DIR__ . platformConsistentPathResove('/../src/bootstrap/app.php'))->handleRequest();
