<?php

// Path resolution helper

// use Dotenv\Dotenv;

use Dotenv\Dotenv;

function platformConsistentPathResove($path): string
{
    return str_replace('/', DIRECTORY_SEPARATOR, $path);
}


// Register autoloader
require __DIR__ . platformConsistentPathResove('/../vendor/autoload.php');

// load env file
$dotenv = Dotenv::createImmutable(platformConsistentPathResove(__DIR__ . '/../'));
$dotenv->load();

// // Handle the request
(require_once __DIR__ . platformConsistentPathResove('/../src/bootstrap/app.php'))->handleRequest();
