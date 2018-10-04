<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Frontend_Controller extends Controller
{
    public function addComment()
    {
        $this->loadManagers();
        $commentManager = new owtta\Blog\Model\CommentManager();
        $commentManager->addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
        header('Location: index.php?action=getChapter&id=' . $_GET['id']);
    }
    
    /**
    *
    * createAccount method tests if the username is already used, and create a new account with
    * data in the register form if it is not
    *
    **/
    public function createAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userId = $userManager->getUserId($_POST['user-name']);
        if (is_null($userId))
        {
            // "Non-existing pseudo in BDD" case
            $newUserData = $userManager->createUser($_POST['user-name'], $_POST['user-email'], $_POST['user-password']);
            if (isset($newUserData) && $newUserData > 0)
            {
                echo 'compte créé';
                $_SESSION['pseudo'] = $_POST['user-name'];
                $_SESSION['id'] = $newUserData;
                $_SESSION['status'] = 'member';
                header('Location: index.php?action=getChaptersList');
            }
            else
            {
                header('Location: index.php?action=register');
            }
        }
        elseif ($userId > 0)
        {
            // "Existing pseudo in BDD" case
            header('Location: index.php?action=register');
        }
    }
    
    /**
    *
    * getChapterContent method tests if the chapter is exists, and display it if so
    *
    **/
    public function getChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();

        $chapter = $chapterManager->getChapterContent($_GET['id']);
        
        if (isset($chapter['id']))
        {
            $commentsCount = $commentManager->getCommentsCountByChapter($_GET['id']);
            $comments = $commentManager->getComments($_GET['id']);
            require('view/frontend/chapterContent.php');
        }
        else
        {
            require('view/frontend/404.php');
        }
    }
    
    public function getChapterslist()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }
    
    public function getSpecificMemberPanel()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);
        require 'view/frontend/userInfo.php';
    }
    
    public function getUserMemberPanel()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_SESSION['id']);
        
        require 'view/frontend/userInfo.php';
    }
    
    /**
    *
    * logAccount method tests if the username and password set on the signin form are correct,
    * and set session data if so
    *
    **/
    public function logAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userData = $userManager->getUserPermissions($_POST['user-name'], $_POST['user-password']);
        if ((isset($userData[0])) && $userData[0] > 0 && isset($userData[1]) && is_string($userData[1]))
        {
            $_SESSION['pseudo'] = $_POST['user-name'];
            $_SESSION['id'] = $userData[0];
            $_SESSION['status'] = $userData[1];
            header('Location: index.php?action=getChaptersList');
        }
        else
        {
            header('Location: index.php?action=signIn');
        }
    }
    
    public function register()
    {
        $this->loadManagers();
        require('view/frontend/register.php');
    }
    
    public function reportComment()
    {
        $this->loadManagers();
        $commentManager = new owtta\Blog\Model\CommentManager();
        $commentReporting = $commentManager->reportComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
    
    public function signIn()
    {
        require('view/frontend/signIn.php');
    }
    
    public function signOut()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        session_destroy();
        header('Location: index.php');
    }
}