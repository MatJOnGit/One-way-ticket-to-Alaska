<?php

require_once 'interfaces/ControllerInterface.php';
require_once 'Controller.php';

class Frontend_Controller extends Controller
{
    public function getChapterslist()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $chapters = $chapterManager->getChapters();

        require('view/frontend/chaptersList.php');
    }

    public function getChapterContent()
    {
        $this->loadManagers();
        $chapterManager = new \owtta\Blog\Model\ChapterManager();
        $commentManager = new \owtta\Blog\Model\CommentManager();

        $chapter = $chapterManager->getChapter($_GET['id']);
        $commentsCount = $commentManager->getCommentsCountByChapter($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        
        require('view/frontend/chapterContent.php');
    }
    
    public function addComment()
    {
        $this->loadManagers();
        var_dump($_POST['comment']);
        $commentManager = new owtta\Blog\Model\CommentManager();
        $addedComment = $commentManager->addComment($_GET['id'], $_SESSION['pseudo'], $_POST['comment']);
        header('Location: index.php?action=getChapter&id=' . $_GET['id']);
    }

    public function register()
    {
        $this->loadManagers();
        require('view/frontend/register.php');
    }
    
    public function createAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $isPseudoExisting = $userManager->isPseudoExisting($_POST['user-name']);
        if (is_null($isPseudoExisting))
        {
            // "Non-existing pseudo in BDD" case
            $newUserData = $userManager->createAccount($_POST['user-name'], $_POST['user-email'], $_POST['user-password']);
            if (isset($newUserData) && $newUserData > 0)
            {
                echo 'compte créé';
                $_SESSION['pseudo'] = $_POST['user-name'];
                $_SESSION['id'] = $newUserData;
                $_SESSION['status'] = 'member';
                header('Location: index.php?action=getChaptersList');
            }
            elseif ($createdAccount === false)
            {
                header('Location: index.php?action=register');
            }
        }
        elseif ($isPseudoExisting > 0)
        {
            // "Existing pseudo in BDD" case
            header('Location: index.php?action=register');
        }
    }

    public function signIn()
    {
        require('view/frontend/signIn.php');
    }
    
    public function logAccount()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userData = $userManager->getUserData($_POST['user-name'], $_POST['user-password']);
        if ((isset($userData[0])) && $userData > 0 && isset($userData[1]) && is_string($userData[1]))
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
    
    public function getUserMemberPanel()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_SESSION['id']);
        require 'view/frontend/userInfo.php';
    }

    public function getSpecificMemberPanel()
    {
        $this->loadManagers();
        $userManager = new \owtta\Blog\Model\UserManager();
        $userInfo = $userManager->getUserInfo($_GET['id']);
        require 'view/frontend/userInfo.php';
    }
    
    public function signOut()
    {
        $this->loadManagers();
        $userManager = new owtta\Blog\Model\UserManager();
        session_destroy();
        header('Location: index.php');
    }
    
    public function reportComment()
    {
        $this->loadManagers();
        $commentManager = new owtta\Blog\Model\CommentManager();
        $commentReporting = $commentManager->reportComment($_GET['commentId']);
        header('Location: index.php?action=getChapter&id=' . $_GET['chapterId']);
    }
}