<?php

namespace owtta\Blog\Model;

require_once("model/Manager.php");

class UserManager extends Manager
{
    /**
    *
    * createUser method insert a users line in database and return its userId if its successful, "0" if not
    *
    **/
    public function createUser($pseudo, $email, $password)
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
    
    public function deleteAccount($userId)
    {
        $db = $this->dbConnect();
        $accountEraser = $db->prepare('DELETE FROM users WHERE id = ?');
        $accountDeletion = $accountEraser->execute(array($userId));
        return $accountDeletion;
    }
    
    public function demoteAdmin($userId)
    {
        $db = $this->dbConnect();
        $adminDemoter = $db->prepare('UPDATE users SET status = "member" WHERE id = ?');
        $adminDemoter->execute(array($userId));
        $demotedAdmin = $adminDemoter->fetch();
        return $demotedAdmin;
    }
    
    public function demoteOwner($userId)
    {
        $db = $this->dbConnect();
        $ownerDemoter = $db->prepare('UPDATE users SET status = "admin" WHERE id = ?');
        $ownerDemoter->execute(array($userId));
        $demotedOwner = $ownerDemoter->fetch();
        return $demotedOwner;
    }
    
    public function editUserEmail($newUserEmail, $userId)
    {
        $db = $this->dbConnect();
        $userEmailUpdater = $db->prepare('UPDATE users SET email = ? WHERE id = ?');
        $userEmailUpdater->execute(array($newUserEmail, $userId));
        $updatedUserEmail = $userEmailUpdater->fetch();
        return $updatedUserEmail;
    }
    
    public function editUserName($newUserName, $userId)
    {
        $db = $this->dbConnect();
        $userNameUpdater = $db->prepare('UPDATE users SET pseudo = ? WHERE id = ?');
        $userNameUpdater->execute(array($newUserName, $userId));
        $updatedUserName = $userNameUpdater->fetch();
        return $updatedUserName;
    }
    
    public function editUserPwd($newUserPwd, $userId)
    {
        $db = $this->dbConnect();
        $userPwdUpdater = $db->prepare('UPDATE users SET password = ? WHERE id = ?');
        $userPwdUpdater->execute(array($newUserPwd, $userId));
        $updatedPwdName = $userPwdUpdater->fetch();
        return $updatedPwdName;
    }
    
    public function getUserCount()
    {
        $db = $this->dbConnect();
        $userCounter = $db->query('SELECT COUNT(*) FROM users');
        $userCount = $userCounter->fetch();
        return $userCount;
    }
    
    public function getUserId($pseudo)
    {
        $db = $this->dbConnect();
        $userIdGetter = $db->prepare('SELECT id FROM users WHERE pseudo = ?');
        $userIdGetter->execute(array($pseudo));
        $userId = $userIdGetter->fetch();
        return $userId[0];
    }
    
    public function getUserInfo($userId)
    {
        $db = $this->dbConnect();
        $userInfoGetter = $db->prepare('SELECT id, pseudo, status, email, DATE_FORMAT(registration_date, \'%d/%m/%Y\') AS registration_date_fr FROM users WHERE id = ?');
        $userInfoGetter->execute(array($userId));
        $userInfo = $userInfoGetter->fetch();
        return $userInfo;
    }
    
    public function getUserPermissions($pseudo)
    {
        $db = $this->dbConnect();
        $userDataGetter = $db->prepare('SELECT id, password, status FROM users WHERE pseudo = ?');
        $userDataGetter->execute(array($pseudo));
        $userData = $userDataGetter->fetch();
        return $userData;
    }
    
    public function getUserStatus($userId)
    {
        $db = $this->dbConnect();
        $userStatusGetter = $db->prepare('SELECT status FROM users WHERE id = ?');
        $userStatusGetter->execute(array($userId));
        $userStatus = $userStatusGetter->fetch();
        return $userStatus;
    }
    
    public function promoteAdmin($userId)
    {
        $db = $this->dbConnect();
        $adminPromoter = $db->prepare('UPDATE users SET status = "owner" WHERE id = ?');
        $adminPromoter->execute(array($userId));
        $promotedAdmin = $adminPromoter->fetch();
        return $promotedAdmin;
    }
    
    public function promoteMember($userId)
    {
        $db = $this->dbConnect();
        $memberPromoter = $db->prepare('UPDATE users SET status = "admin" WHERE id = ?');
        $memberPromoter->execute(array($userId));
        $promotedMember = $memberPromoter->fetch();
        return $promotedMember;
    }
}