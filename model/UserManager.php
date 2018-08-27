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
}