<?php

require_once 'interfaces/ControllerInterface.php';

class Controller implements iController
{
    public $usernameRegex = '#^(?=.{5,20}$)[a-zA-Z]+([_-]?[a-zA-Z0-9])*$#';
    
    /**
    *
    * displayCustomNavBar method tests the 'status' data in session and display the right nav bar view.
    *
    **/
    protected function displayNavBar()
    {
        if (isset($_SESSION['status']))
        {
            if (($_SESSION['status'] === 'owner') || ($_SESSION['status'] === 'superadmin') || ($_SESSION['status'] === 'admin'))
            {
                require 'view/frontend/adminBar.php';
            }
            else
            {
                require 'view/frontend/memberBar.php';
            }
        }
        
        else
        {
            require 'view/frontend/logBar.php';
        }
    }
    
    public function getChapters()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        return $chapters;
    }
    
    public function loadManagers()
    {
        require_once('model/ChapterManager.php');
        require_once('model/CommentManager.php');
        require_once('model/UserManager.php');
    }


}