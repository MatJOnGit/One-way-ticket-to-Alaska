<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    public function getUserInfo($userId)
    {
        $db = $this->dbConnect();
        $userInfoGetter = $db->prepare('SELECT id, pseudo, status, email, DATE_FORMAT(registration_date, \'%d/%m/%Y à %Hh%i\') AS registration_date_fr, avatar_id FROM users WHERE id = ?');
        $userInfoGetter->execute(array($userId));
        $userInfo = $userInfoGetter->fetch();
        return $userInfo;
    }
    
    public function getUserCount()
    {
        $db = $this->dbConnect();
        $userCounter = $db->query('SELECT COUNT(*) FROM users');
        $userCount = $userCounter->fetch();
        return $userCount;
    }
    
    public function testAccount($pseudo)
    {
        $db = $this->dbConnect();
        $pseudoTester = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
        $pseudoTester->execute(array($pseudo));
        $pseudoTestingResults = $pseudoTester->fetch();
        return $pseudoTestingResults[0];
    }
    
    public function createAccount($pseudo, $email, $password)
    {
        $db = $this->dbConnect();
        $accountCreator = $db->prepare('INSERT INTO users (pseudo, status, email, password, registration_date) VALUES (?, "member", ?, ?, NOW())');
        $accountCreator = $accountCreator->execute(array($pseudo, $email, $password));
        if ($accountCreator)
        {
            $newUserId = $db->lastInsertId();
        }
        else
        {
            $newUserId = 0;
        }
        return $newUserId;
    }
    
    public function getUserPermissions($pseudo, $password)
    {
        $db = $this->dbConnect();
        $userDataGetter = $db->prepare('SELECT id, status FROM users WHERE pseudo = ? AND password = ?');
        $userDataGetter->execute(array($pseudo, $password));
        $userData = $userDataGetter->fetch();
        return $userData;
    }
    
    public function deleteAccount($userId)
    {
        $db = $this->dbConnect();
        $accountEraser = $db->prepare('DELETE FROM `users` WHERE id = ?');
        $accountDeletion = $accountEraser->execute(array($userId));
        
        return $accountDeletion;
    }
    
    public function promoteMember($userId)
    {
        $db = $this->dbConnect();
        $memberPromoter = $db->prepare('UPDATE users SET status = "admin" WHERE id = ?');
        $memberPromoter->execute(array($userId));
        $promotedMember = $memberPromoter->fetch();
        return $promotedMember;
    }
    
    public function demoteAdmin($userId)
    {
        $db = $this->dbConnect();
        $adminDemoter = $db->prepare('UPDATE users SET status = "member" WHERE id = ?');
        $adminDemoter->execute(array($userId));
        $demotedAdmin = $adminDemoter->fetch();
        return $demotedAdmin;
    }
                                
    public function promoteAdmin($userId)
    {
        $db = $this->dbConnect();
        $adminPromoter = $db->prepare('UPDATE users SET status = "owner" WHERE id = ?');
        $adminPromoter->execute(array($userId));
        $promotedAdmin = $adminPromoter->fetch();
        return $promotedAdmin;
    }
    
    public function demoteOwner($userId)
    {
        $db = $this->dbConnect();
        $ownerDemoter = $db->prepare('UPDATE users SET status = "admin" WHERE id = ?');
        $ownerDemoter->execute(array($userId));
        $demotedOwner = $ownerDemoter->fetch();
        return $demotedOwner;
    }
}