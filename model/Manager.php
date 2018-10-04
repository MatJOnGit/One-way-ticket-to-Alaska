<?php

namespace owtta\Blog\Model;

class Manager {
    
    /**
    *
    * dbConnect method allow the website to log to the database
    *
    **/
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $db;
    }
}