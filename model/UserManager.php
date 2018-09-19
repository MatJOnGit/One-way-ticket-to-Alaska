<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUserInfo($userId)
    {
        $db = $this->dbConnect();
        $userInfo = $db->prepare('SELECT id, pseudo, email, DATE_FORMAT(registration_date, \'%d/%m/%Y à %Hh%i\') AS registration_date_fr FROM users WHERE id = ?');
        $userInfo->execute(array($userId));
        $info = $userInfo->fetch();
        return $info;
    }
    
    public function getUserCount()
    {
        $db = $this->dbConnect();
        $userCount = $db->query('SELECT COUNT(*) FROM users');
        $userNumber = $userCount->fetch();
        return $userNumber;
    }
    
    public function isPseudoExisting($pseudo)
    {
        $db = $this->dbConnect();
        $pseudoTesting = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
        $pseudoTesting->execute(array($pseudo));
        $pseudoTestingResults = $pseudoTesting->fetch();
        return $pseudoTestingResults[0];
    }
    
    public function createAccount($pseudo, $email, $password)
    {
        $db = $this->dbConnect();
        $accountCreation = $db->prepare('INSERT INTO users (pseudo, role, email, password, registration_date) VALUES (?, "member", ?, ?, NOW())');
        $isAccountCreated = $accountCreation->execute(array($pseudo, $email, $password));
        return $isAccountCreated;
    }
    
    public function isIdCorrect($pseudo, $password)
    {
        $db = $this->dbConnect();
        $idTesting = $db->prepare('SELECT status FROM users WHERE pseudo = ? AND password = ?');
        $idTesting->execute(array($pseudo, $password));
        $idTestingResults = $idTesting->fetch();
        return $idTestingResults[0];
    }
}