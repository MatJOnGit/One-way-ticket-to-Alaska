<?php

namespace Project_Alaska\Model;

class Manager {
    
    /**
    *
    * dbConnect method allow the website to log to the database
    *
    **/
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=one way ticket to alaska;charset=utf8', 'root', '');
        return $db;
    }
}