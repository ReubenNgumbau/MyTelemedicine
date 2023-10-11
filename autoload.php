<?php
/**
 * Autoload.php for Telemedicine Platform
 */

spl_autoload_register(function ($class) {
    $classFile = APP_ROOT . '/classes/' . $class . '.php';
    
    if (file_exists($classFile)) {
        require_once $classFile;
    }
});

// Autoload other libraries and dependencies using Composer
require_once APP_ROOT . '/vendor/autoload.php';
