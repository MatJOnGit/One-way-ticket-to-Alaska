<?php

function autoloader($class_name) {
    foreach(glob(__DIR__ . '/*', GLOB_ONLYDIR) as $dir) {
        if (file_exists("$dir/" . $class_name . '.php')) {
            require_once "$dir/" . $class_name . '.php';
            echo "$dir/" . $class_name . 'chargée ...';
            break;
        }
    }
}

spl_autoload_register('autoloader');