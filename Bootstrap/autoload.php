<?php
session_start();

spl_autoload_register(function ($className) {
    $filename = __DIR__ . '/../Classes/' . $className . '.php';

    if(file_exists($filename)) {
        require_once $filename;
    }
});