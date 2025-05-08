<?php

class Autoloader {
    public function __construct() {
        spl_autoload_register(function ($class) {
            $file = __DIR__ . '/../Classes/' . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
            }
        });
    }
}

// Instancier l'autoloader
new Autoloader();
